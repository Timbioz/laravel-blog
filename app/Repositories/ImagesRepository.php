<?php
/**
 * Created by PhpStorm.
 * User: timbioz
 * Date: 08.12.2018
 * Time: 0:27
 */

namespace App\Repositories;

use App\Helpers\Transliterate;
use App\Interfaces\ImagesRepositoryInterface;
use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImagesRepository implements ImagesRepositoryInterface
{
    /**
     * @var Image
     */
    protected $image;

    /**
     * ImagesRepository constructor.
     *
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * @param FormRequest $request
     *
     * @return boolean
     */
    public function store(FormRequest $request): bool
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();

        $name = $request->get('name');

        if ($name === null) {
            $name = $image->getClientOriginalName();
        }
        else {
            $name = $name . '.' . $extension;
        }

        $this->image->user_id = auth()->id();
        $this->image->filename = $name;
        $this->image->title_text = $request->get('title');
        $this->image->alt_text = $request->get('alt');
        $this->image->file_extension = $extension;
        $this->image->mime_type = $image->getMimeType();

        $image->move(storage_path(config('image.upload_path') . 'posts/main/'), $name);

        return $this->image->save();
    }
}
