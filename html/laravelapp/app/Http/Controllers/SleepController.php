<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Services\UtilService;
use Illuminate\Http\Request;

class SleepController extends Controller
{
  protected $utilService;

  protected $arr17 = [
    '00000000000000                                                    00000000000000000000                          00000000                00000000000000000000000000',
    '    000000                                    00                      0000            0000                  00            00            00          0000        00',
    '    0000                                    0000                      0000              0000            0000                0000                    0000          ',
    '    0000                                    000000                    0000              000000          0000                0000                    0000          ',
    '    0000                                  00  0000                    0000                0000        0000                    0000                  0000          ',
    '    0000                                  00  000000                  0000              000000        0000                    0000                  0000          ',
    '    0000                                00      0000                  0000              0000        000000                    000000                0000          ',
    '    0000                                00      000000                0000            0000          0000                      000000                0000          ',
    '    0000                                00        0000                000000000000000000            0000                        0000                0000          ',
    '    0000                              00          0000                0000            000000        0000                        0000                0000          ',
    '    0000                              00          000000              0000              000000      000000                    000000                0000          ',
    '    0000                            00000000000000000000              0000                0000        0000                    0000                  0000          ',
    '    0000                            00              000000            0000                0000        0000                    0000                  0000          ',
    '    0000                          00                  0000            0000                0000          0000                0000                    0000          ',
    '    0000                00        00                  000000          0000              000000          0000                0000                    0000          ',
    '    0000              0000      0000                  000000          0000            000000              0000          0000                      000000          ',
    '000000000000000000000000      00000000              000000000000  0000000000000000000000                      0000000000                      00000000000000      ',
  ];

  protected $fnThrow;

  public function __construct(UtilService $utilService)
  {
    $this->utilService = $utilService;
    // $this->fnThrow = fn (string $msg): void => $this->utilService->throwHttpResponseException($msg);
  }

  public function sleepApi(int $num): string
  {
    return json_encode($num);

    /* ガード処理 */
    // if ($num < 0 || count($this->arr17) <= $num) {
    //   // ($this->$fnThrow)('apiが対応していない数値です: ' . $num);
    //   $msg = 'apiが対応していない数値です: ' . $num;
    //   $this->utilService->throwHttpResponseException($msg);
    // }

    /* sleep処理 */
    // TODO

    /* json返却処理 */
    // return json_encode($this->arr17[$num]);
  }

  public function delimiter()
  {
    return json_encode('×');
  }

  public function maxnum()
  {
    return count(Title::all());
  }

  public function first($id)
  {
    $m = Title::find($id);
    if (!$m) {
      $this->utilService->throwHttpResponseException("id: $id は存在しません。");
    }

    $a = explode('×', $m->text);

    return json_encode($a[0]);
  }

  public function second($id, Request $request)
  {
    $m = Title::find($id);
    if (!$m) {
      $this->utilService->throwHttpResponseException("id: $id は存在しません。");
    }

    $a = explode('×', $m->text);

    $first_text = $request->first_text;
    if ($a[0] !== $first_text) {
      $this->utilService->throwHttpResponseException("id: $id, first_text: $first_text の組は存在しません。");
    }

    return json_encode($a[1]);
  }

  public function third($id, Request $request)
  {
    $m = Title::find($id);
    if (!$m) {
      $this->utilService->throwHttpResponseException("id: $id は存在しません。");
    }

    $a = explode('×', $m->text);

    $first_text = $request->first_text;
    if ($a[0] !== $first_text) {
      $this->utilService->throwHttpResponseException("id: $id, first_text: $first_text の組は存在しません。");
    }

    $second_text = $request->second_text;
    if ($a[1] !== $second_text) {
      $this->utilService->throwHttpResponseException("id: $id, first_text: $first_text, second_text: $second_text の組は存在しません。");
    }

    return json_encode($a[2]);
  }

  public function check($id, Request $request)
  {
    $m = Title::find($id);
    if (!$m) {
      $this->utilService->throwHttpResponseException("id: $id は存在しません。");
    }

    $full_text = $request->full_text;
    if ($full_text !== $m->text) {
      $this->utilService->throwHttpResponseException("id: $id, full_text: $full_text の組は存在しません。");
    }

    $msg = "第${id}話「${full_text}」";
    return json_encode($msg);
  }
}
