<?php


define('PAGINATION_COUNT', 10);

function getFolder()
{
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


function uploadImage($folder,$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    return $filename;
 }




function jsonResponse($data = null, $status = 200, $msg = "تم العملية بنجاح")
{
    return response()->json([
        'status' => $status,
        'message' => $msg,
        'data' => $data
    ]);
}

function successResponse($data = null, $msg = "تم العملية بنجاح")
{
    return jsonResponse($data, 200, $msg);
}

function errorResponse($msg = "حدث خطأ أثناء تنفيذ العملية", $status = 500)
{
    return jsonResponse(null, $status, $msg);
}
