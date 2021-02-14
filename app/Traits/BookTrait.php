<?php
namespace App\Traits;

use App\Models\Genre;
use App\Models\Author;

trait BookTrait {

    public function getAllGenres() {
        return Genre::select('id', 'name')->get()->toArray();
    }

    public function getAllAuthors() {
        return Author::select('id', 'name')->get()->toArray();
    }

    public function getAllGenresAuthors() {
        $genres = $this->getAllGenres();
        $authors = $this->getAllAuthors();
        return ['genres' => $genres, 'authors' => $authors];
    }

    public function coverUpload($coverFile) {
        $saveAs = 'jpg';
        $coverFileName = time().'.'.$saveAs;
        $destinationPath = public_path('/covers');
        $coverImage = Image::make($cover->path());
        $coverImage->resize(640, 640, function ($constraint) {
            $constraint->aspectRatio();
        });
        $coverImage->save($destinationPath.'/'.$coverFileName, 90);
        return $coverFileName;
    }

}