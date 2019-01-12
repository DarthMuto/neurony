<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class UpdateThreadRequest
 * @package App\Http\Requests
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $delete
 */
class UpdateThreadRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return !!Auth::id();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		$uniqueTitle = 'unique:threads,title';
		if ($this->id) {
			$uniqueTitle .= ',' . $this->id;
		}
		if ($this->delete) {
			return [];
		}
		return [
			'title' => 'required|min:3|' . $uniqueTitle . '|no_numbers',
			'content' => 'max:255|ends_with_dot',
		];
	}
}
