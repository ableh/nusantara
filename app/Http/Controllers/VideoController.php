<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vote;

use App\Response;

use App\Comment;

use App\Emmoticon;

use App\Video;

use App\Uid;

class VideoController extends Controller
{
    public function Video(Request $request)
    {
        
    	$uid = $request->uid;
    	$object_uid = Uid::where ('uid', $uid)->first();
    	if (!$object_uid) {

    		$res['success'] = false;
    		$res['message'] = 'uid not found';
    		
    		return response($res);
    				
    		
    	}
    	$video = new Video;
    	$video->is_publist = $request->is_publist;
    	$video->title = $request->title;
    	$video->uid = $object_uid->id;

    	if ($video->save()) {

    		$res['success'] = true;
    		$res['message'] = 'Success';
    		$res['data'] = $video;
    		
    		return response($res);
    		
    	} else{
    		$res['success'] = false;
    		$res['message'] = 'Message';
    		
    		return response($res);
    		
    	}

    }

    public function commentVideo(Request $request)
    {
        $uid = $request->uid;
        $object_uid = Uid::where ('uid', $uid)->first();
        if (!$object_uid) {

            $res['success'] = false;
            $res['message'] = 'uid not found';
            
            return response($res);
                    
            
        }

    	$comment = new Comment;
    	$comment->uid = $object_uid->id;
    	$comment->user_id = $request->user_id;
    	$comment->content = $request->content;

    	if ($comment->save()) {
    		$res['success'] = true;
    		$res['message'] = 'Success';
    		$res['data'] = $comment;
    	
    			return response($res);
    	} else {
    			$res['success'] = false;
    			$res['message'] = 'error';
    		
   				return response($res);
    		
    	}
    }

    public function voteVideo(Request $request)
    {
        $uid = $request->uid;
        $object_uid = Uid::where ('uid', $uid)->first();
        if (!$object_uid) {

            $res['success'] = false;
            $res['message'] = 'uid not found';
            
            return response($res);
                    
            
        }

    	$vote = new Vote();
    	$vote->user_id = $request->user_id;
    	$vote->uid = $object_uid->id;

    	if ($vote->save()) {
    		$res['success'] = true;
    		$res['message'] = 'Success';
    		$res['data'] = $vote;
    	
    			return response($res);
    	} else {
    			$res['success'] = false;
    			$res['message'] = 'error';
    		
   				return response($res);
    		
    	}
    }

    public function Response(Request $request)
    {
        $uid = $request->uid;
        $object_uid = Uid::where ('uid', $uid)->first();
        if (!$object_uid) {

            $res['success'] = false;
            $res['message'] = 'uid not found';
            
            return response($res);
                    
            
        }

    	$response = new Response;
    	$response->user_id = $request->user_id;
    	$response->uid = $object_uid->id;

        if ($response->save()) {
            $res['success'] = true;
            $res['message'] = 'Success';
            $res['data'] = $response;
        
                return response($res);
        } else {
                $res['success'] = false;
                $res['message'] = 'error';
            
                return response($res);
            
        }
    }

    public function likeVideo(Request $request)
    {
        $emmoticon = new Emmoticon;
        $emmoticon->name = $request->name;
        $emmoticon->picture = $request->picture;

        if ($emmoticon->save()) {
            $res['success'] = true;
            $res['message'] = 'succes';
            $res['data'] = $emmoticon;

            return response($res);
        
        } else {
            $res['success'] = false;
            $res['message'] = 'error';
            
            return response($res);
            
        }
    }
}
