<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConversationResource;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConversationController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all conversations
        $conversations = Conversation::oldest()->get();

        //return collection of conversations as a resource
        return new ConversationResource(true, 'List Data Conversations', $conversations);
    }

     /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'message'       => 'required',
            'direction'     => 'required',
            'sender'        => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create conversation
        $conversation = Conversation::create([
            'message'       => $request->message,
            'direction'     => $request->direction,
            'sender'        => $request->sender,
        ]);

        //return response
        return new ConversationResource(true, 'Data Conversation Berhasil Ditambahkan!', $conversation);
    }
}
