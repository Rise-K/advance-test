<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Validator;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    private $contentItems = ["fullname", "gender", "email","postcode","address","opinion"];

	private $validator = [
		// 'fullname' => 'required',
        // 'gender' => 'required',
        'email'  => 'required|email',
        'postcode'  => 'required|max:8',
        'address'  => 'required',
        'opinion'  => 'required|max:120',
	];

    public function index()
    {
        return view("index");
    }

    public function post(Request $request)
    {
        $input = $request->only($this->contentItems);

		$validator = Validator::make($input, $this->validator);
		if($validator->fails()){
			return redirect()
                ->action([ContentController::class, 'index'])
				->withInput()
				->withErrors($validator);
		}

        $request->session()->put("form_input", $input);

		return redirect()->action([ContentController::class, 'confirm']);
    }


    public function confirm(Request $request)
    {
        //セッションから値を取り出す
		$input = $request->session()->get("form_input");

		// //セッションに値が無い時はフォームに戻る
		// if(!$input){
		// 	return redirect("/content");
		// }
		// return view("index",["input" => $input]);
    }

    public function send(Request $request)
    {
        //セッションから値を取り出す
		$input = $request->session()->get("form_input");

         //戻るボタンが押された時
		if($request->has("back")){
			return redirect("/content")
				->withInput($input);
		}

		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action([ContentController::class, 'index']);
		}

		//セッションを空にする
		$request->session()->forget("form_input");

		return redirect("/content/thanks");
    }

    public function thanks()
    {
        return view("thanks");
    }

    public function admin()
    {
        $contents = Content::Paginate(10);
        return view("admin")->with("contents",$contents);
    }

    public function delete(Request $request)
    {
        $content = Content::find($request->id)->delete();
        return redirect('/content/admin');
    }
}
