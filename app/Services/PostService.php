<?php
namespace App\Services;
use App\Repositories\PostRepository;
class PostService
{
	private $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

	public function create($data){
		$post = $this->postRepository->create($data);
		// enviar email
		// notificar usuario
		// etc....
		return $post;
	}
}