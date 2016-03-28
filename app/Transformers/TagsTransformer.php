<?php
/**
 * User: Luis
 * Date: 27/03/2016
 * Time: 02:19 AM
 */

namespace App\Transformers;

use App\Http\Models\Cliente\Tag;
use League\Fractal\TransformerAbstract;

class TagsTransformer extends TransformerAbstract
{
	public function transform(Tag $tag)
	{
		return [
			'id'  => $tag->id,
			'tag' => $tag->tag,
		];
	}
}