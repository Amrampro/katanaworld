<?php


namespace App\Action;


use App\Http\Requests\SermonUpdateRequest;
use App\Models\Sermon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SermonUpdateAction
{
	public function handle(SermonUpdateRequest $request, Sermon  $sermon)
	{

		// image upload
		if ($request->hasFile('poster_url')) {
			$image = $request->file('poster_url');
			$reFullImage = 'fi' . time() . '.' . $image->getClientOriginalExtension();
			$dest = public_path('/images/sermon');
			$image->move($dest, $reFullImage);
			$img_url = 'images/sermon/' . $reFullImage;
		} else {
			$img_url = $reFullImage = 'na';
		}

		// video upload
		if ($request->hasFile('video_file')) {
			$video = $request->file('video_file');
			$reVideo = 'fi' . time() . '.' . $video->getClientOriginalExtension();
			$dest = public_path('/storage/sermons');
			$video->move($dest, $reVideo);
			$video_url = 'sermons/' . $reVideo;
		} else {
			$video_url = $reVideo = 'na';
		}

		$data = [
			"titre" => $request->input("titre"),
			"description" => $request->input("description"),
			"is_local" => $request->input("type") != "link",
			"category_sermon_id" => $request->input("category_sermon_id"),
			"updated_at" => now(),
			"poster_url" => $request->hasFile("poster_url") ?
				$img_url : $sermon->poster_url,
			// "poster_url" => $request->hasFile("poster_url") ?
			// 	$request->file("poster_url")->store("poster") : $sermon->poster_url,
			// "video_url" => $request->input("type") == "link" ? $request->input("video_link") : $request->input("video_url"),
			"video_url" => $request->input("type") == "link" ? $request->input("video_link") : $request->input("video_url"),
			"user_id" => $request->user()->id
		];
		if ($request->hasFile("poster_url")) {
			Storage::delete($sermon->poster_url);
		}
		if ($request->hasFile("video_url")) {
			Storage::delete($sermon->video_url);
		}
		$sermon->update($data);
	}
}
