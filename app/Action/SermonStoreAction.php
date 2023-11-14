<?php


namespace App\Action;


use App\Models\Sermon;
use Illuminate\Database\Eloquent\Model;

class SermonStoreAction
{
	public function handle($request){
		// image upload
		if($request->hasFile('poster_url')){
            $image=$request->file('poster_url');
            $reFullImage = 'fi'.time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/images/sermon');
            $image->move($dest, $reFullImage);
            $img_url ='images/sermon/' . $reFullImage;
        } else {
            $img_url = $reFullImage = 'na';
        }

		// video upload
		if($request->hasFile('video_file')){
            $video=$request->file('video_file');
            $reVideo = 'fi'.time().'.'.$video->getClientOriginalExtension();
            $dest=public_path('/storage/sermons');
            $video->move($dest, $reVideo);
            $video_url ='sermons/' . $reVideo;
        } else {
            $video_url = $reVideo = 'na';
        }
		
		$sermon = new Sermon();

		$sermon->titre = $request->input("titre");
		$sermon->description = $request->input("description");
		$sermon->author = $request->input("author");
		$sermon->is_local = $request->input("type") != "link";
		$sermon->category_sermon_id = $request->input("category_sermon_id");
		if ($request->input("type") == "link"){
			$sermon->video_url = $request->input("video_link");
		}else{
			$sermon->video_url = $video_url;
			// $sermon->video_url = $request->file("video_file")->store("sermons");
		}
		// $sermon->poster_url = $request->file("poster_url")->store("poster");
		$sermon->poster_url = $img_url;
		$sermon->user_id = $request->user()->id;
		$sermon->save();
	}

}
