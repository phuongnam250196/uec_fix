	<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;

class NotifyController extends Controller
{
    public function index()
    {
        return view('notifies.index');
    }
    public function info($id)
    {
        $notify = Notification::findOrFail($id);
        $notify->admin = $notify->admin;
        return view('notifies.info',['id' => $id]);
    }
}
