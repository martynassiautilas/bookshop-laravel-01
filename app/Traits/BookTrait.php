<?php
namespace App\Traits;

use App\Models\Genre;
use App\Models\Author;

use Image;
use File;

trait BookTrait {

    public function getAllGenres() {
        return Genre::select('id', 'name')->get()->toArray();
    }

    public function getAllAuthors() {
        return Author::select('id', 'name')->get()->toArray();
    }

    public function getAllGenresAuthors($json_encode = false) {
        $genres = $this->getAllGenres();
        $authors = $this->getAllAuthors();
        if($json_encode) {
            return ['genres' => json_encode($genres), 'authors' => json_encode($authors)];
        }
        return ['genres' => $genres, 'authors' => $authors];
    }

    public function coverFileDelete($oldCoverFile) {
        // Reik tikrinimo, o jeigu jau failas neegzistuoja.
        $destinationPath = public_path('/covers');
        if($oldCoverFile) {
            File::delete($destinationPath.'/'.$oldCoverFile);
        }
    }

    public function coverUpload($coverFile, $oldCoverFile = false) {
        $saveAs = 'jpg';
        $coverFileName = time().'.'.$saveAs;
        $destinationPath = public_path('/covers');
        $coverImage = Image::make($coverFile->path());
        $coverImage->resize(640, 640, function ($constraint) {
            $constraint->aspectRatio();
        });
        $coverImage->save($destinationPath.'/'.$coverFileName, 90);

        if($oldCoverFile) {
            $this->coverFileDelete($oldCoverFile);
        }

        return $coverFileName;
    }

    public function fixGenresAuthorsOldValues() {
        $data['oldGenres'] = old('genres') ? json_encode(array_map('intval', explode(',', old('genres')))) : null;
        $data['oldAuthors'] = old('authors') ? json_encode(array_map('intval', explode(',', old('authors')))) : null;
        return $data;
    }

}