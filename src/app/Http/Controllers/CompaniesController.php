<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Base\Prefecture;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->companies = new Companies();
        $this->prefecture = new Prefecture();
    }

    /**
     * 一覧画面
     */
    public function index()
    {
        $companies = $this->companies->findAllCompaniess();

        // 都道府県
        $prefectures_collection = $this->prefecture->select('id', 'display_name')->get();
        $prefectures = $prefectures_collection->mapWithkeys(function ($prefecture) {
            return [$prefecture['id'] => $prefecture['display_name']];
        });

        return view('companies.index', compact('companies', 'prefectures'));
    }

    /**
     * 登録画面
     */
    public function create(Request $request)
    {
        $prefectures_collection = $this->prefecture->select('id', 'display_name')->get();
        $prefectures = $prefectures_collection->mapWithkeys(function ($prefecture) {
            return [$prefecture['id'] => $prefecture['display_name']];
        });

        //都道府県のmodelからデータ取得してViewに渡す（Prefecture.php)
        return view('companies.create', compact('prefectures'));
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        $registerCompanies = $this->companies->InsertCompanies($request);
        return redirect()->route('companies.index');
    }

    /**
     * 詳細
     */
    public function show($id)
    {
        //
    }


    /**
     * 編集
     */
    public function edit(Request $request, int $company_id)
    {
        $company = Companies::find($company_id);
        return view('companies.edit', compact('company'));
    }

    /**
     * 更新
     */
    public function update(Request $request, int $company_id)
    {
        $companies = Companies::find($request->id);
        $companies->title = $request->title;
        $companies->content = $request->content;
        $companies->save();
        return redirect('/companies');
    }

    /**
     * 削除
     */
    public function destroy()
    {
        Companies::find()->delete();
        return;
    }
}
