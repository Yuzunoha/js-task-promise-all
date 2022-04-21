<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Services\UtilService;
use Illuminate\Http\Request;

class SleepController extends Controller
{
  protected $utilService;

  public function __construct(UtilService $utilService)
  {
    $this->utilService = $utilService;
  }

  public function sleepApi(int $ms): string
  {
    return json_encode($ms);
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
