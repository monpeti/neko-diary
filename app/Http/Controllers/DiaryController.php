<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiaryController extends Controller
{
    public function index(Request $request)
    {
        $query = Diary::query();

        // キーワード検索
        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                // タイトル
                $q->where(
                    'title',
                    'like',
                    '%' . $request->keyword . '%'
                )
                // 本文
                ->orWhere(
                    'body',
                    'like',
                    '%' . $request->keyword . '%'
                )
                // タグ
                ->orWhere(
                    'tag',
                    'like',
                    '%' . $request->keyword . '%'
                );
            });
        }

        // 日付検索
        if ($request->date) {

            $query->whereDate(
                'date',
                $request->date
            );
        }

        $diaries = Diary::orderBy('date', 'desc')
            ->paginate(6);

        return view('diaries.index', compact('diaries'));
    }

    // 新規投稿
    public function create()
    {
        return view('diaries.create');
    }

    // 日記詳細ページ
    public function show($id)
    {
        $diary = Diary::findOrFail($id);

        return view('diaries.show', compact('diary'));
    }

    public function store(Request $request)
    {
        $this->validateDiary($request);

        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        }

        Diary::create([
            'title' => $request->title,
            'body' => $request->body,
            'weight' => $request->weight,
            'food_amount' => $request->food_amount,
            'image_path' => $path,
            'date' => $request->date,
            'water_count' => $request->water_count,
            'tag' => $request->tag,
        ]);

        return redirect('/diaries');
    }

    // 編集
    public function edit($id)
    {
        $diary = Diary::findOrFail($id);

        return view('diaries.edit', compact('diary'));
    }

    // 保存
    public function update(Request $request, $id)
    {
        $this->validateDiary($request);
    
        $diary = Diary::findOrFail($id);

        $path = $diary->image_path; // 新しい画像がない場合は「そのまま維持」

        if ($request->hasFile('image')) {
            if ($diary->image_path) {
                Storage::disk('public')->delete($diary->image_path);
            }

            $path = $request->file('image')->store('images', 'public');
        }

        $diary->update([
            'title' => $request->title,
            'body' => $request->body,
            'weight' => $request->weight,
            'food_amount' => $request->food_amount,
            'image_path' => $path,
            'date' => $request->date,
            'water_count' => $request->water_count,
            'tag' => $request->tag,
    ]);

        // 編集後、詳細ページにとどまるよう記載
        return redirect()->route('diaries.show', $diary->id);
    }

    // 日記検索メソッド
    public function search(Request $request)
    {
        $query = Diary::query();

        // キーワード検索
        if ($request->keyword) {

            $query->where(function ($q) use ($request) {
                // タイトル
                $q->where(
                    'title',
                    'like',
                    '%' . $request->keyword . '%'
                )
                // 本文
                ->orWhere(
                    'body',
                    'like',
                    '%' . $request->keyword . '%'
                )
                // タグ
                ->orWhere(
                    'tag',
                    'like',
                    '%' . $request->keyword . '%'
                );
            });
    }

    // 日付検索
    if ($request->date) {

        $query->whereDate(
            'date',
            $request->date
        );
    }

    $diaries = $query
        ->orderBy('date', 'desc')
        ->get();

    return view(
        'diaries.search',
        compact('diaries')
    );
}

    // アルバムページ
    public function album()
    {
        $diaries = Diary::whereNotNull('image_path')
            ->latest()
            ->get();

            return view(
            'diaries.album',
            compact('diaries')
        );
    }

    // バリデートメソッド
    private function validateDiary(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:5',
                'body' => 'required|max:5',
                'weight' => 'nullable|numeric',
                'image' => 'nullable|image|max:5120',
                'water_count' => 'nullable|integer|min:0',
            ],
            [
                'title.required' => 'タイトルを入力してください。',
                'title.max' => 'タイトルは50文字以内で入力してください',

                'body.required' => '本文を入力してください。',
                'body.max' => '本文は500文字以内で入力してください',

                'weight.numeric' => '体重は数字で入力してください。',

                'image.image' => '画像ファイルを選択してください',
                'image.max' => '画像サイズは5MB以下にしてください',
            ]
        );
    }

    // 削除
    public function destroy($id)
    {
        $diary = Diary::findOrFail($id);
        $diary->delete();

        return redirect('/diaries');
    }
    
    // 日記に登録した体重をグラフで表示する
    public function graph()
    {
        $diaries = \App\Models\Diary::orderBy('created_at')->get();
        
        $dates = $diaries->pluck('created_at')->map(function ($date) {
            return $date->format('Y-m-d');
            });
            
            $weights = $diaries->pluck('weight');
            
            return view('diaries.graph', compact('dates', 'weights'));
    }

}