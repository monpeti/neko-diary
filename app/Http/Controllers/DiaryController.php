<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::all(); // DBから全部取得

        return view('diaries.index', compact('diaries'));
    }

    // 日記ごとのページ遷移
    public function show($id)
    {
        $diary = Diary::findOrFail($id);

        return view('diaries.show', compact('diary'));
    }

    public function store(Request $request)
    {
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
    ]);

        // 編集後、詳細ページにとどまるよう記載
        return redirect()->route('diaries.show', $diary->id);
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