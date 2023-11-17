<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Board;


class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 로그인 체크
        if(!Auth::check()) {
            return redirect()->route('user.login.get');
        }

        // 게시글 획득
        $result = Board::get();
        
        return view('list')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::begintransaction();

        // $result = 
        // DB::table('boards')->insert([
        //     'b_title' => $_POST['b_title']
        //     ,'b_content' => $_POST['b_content']
        //     ,'created_at' => now()
        //     ,'updated_at' => now()
        // ]);

        // if(!$result) {
        //     DB::rollback();
        // } else {
        //     DB::commit();
        // }
        // return redirect()->route('board.index');

        // 방법2
        $arrInputData = $request->only('b_title', 'b_content');
        $result = Board::create($arrInputData);
            // save() 사용하는 경우
                // $model = new Board($arrInputData);
                // $model->save();
        return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // *** del 231116 미들웨어로 이관 ***
        // 로그인 체크
        // if(!Auth::check()) {
        //     return redirect()->route('user.login.get');
        // }
        
        // 게시글 획득
        $result = Board::find($id);
        
        // 조회수 올리기
        $result->b_hits++;  // 조회수 1 증가
        $result->timestamps = false;     // 조회수 올라갈때마다 update되는거 방지용

        // 업데이트 처리
        $result->save();

        return view('detail')->with('data', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Board::find($id);

        return view('edit')->with('data', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = Board::find($id);
        $result->b_title = $request->b_title;
        $result->b_content = $request->b_content;
        $result->save();
      
        return redirect()->route('board.show', ['board' => $result->b_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 글 특정할 데이터 받아오고
        // $result = Board::find($id)->delete();
        // Board::destroy($id);
        Log::debug("-------- 삭제처리 시작 ---------");
        try {
            DB::beginTransaction();
            Log::debug("트랜잭션 시작");
            Board::destroy($id);
            Log::debug("삭제 완료");
            DB::commit();
            Log::debug("커밋 완료");
        } catch(Exception $e) {
            DB::rollback();
            Log::debug("예외 발생 : 롤백 완료");
            return redirect()->route('error')->withErrors($e->getmMessage());
        }
        Log::debug("-------- 삭제처리 종료 ---------");
        return redirect()->route('board.index');
    }
}
