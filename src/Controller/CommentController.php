<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comment;
use App\Entity\Post;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment/hide/{id}", name="comment_hide", methods={"POST"})
     *
     */
    public function hide($id)
    {
        $comment = $this->getDoctrine()->getRepository(Comment::class)->find($id);
        if($comment->getHide() == false) {
            $comment->setHide(1);
        } else {
            $comment->setHide(0);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();
        return new Response();

    }
    /**
     * @Route("/comment/delete/{id}", name="comment_delete", methods={"DELETE", "GET"}))
     *  @IsGranted("ROLE_ADMIN")
     */
    public function delete($id) {
        $post = $this->getDoctrine()->getRepository(Comment::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($post);
        $entityManager->flush();
        $response = new Response();
        $response->send();
    }

    /**
     * @Route("/comment/add", name="comment_add", methods={"DELETE", "POST"})
     */
    public function add(Request $request) {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($request->get('id'));
        $comment = new Comment();
        $comment->setPost($post);
        $comment->setContent($request->get('content'));
        $comment->setHide(0);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();
        return new Response();
    }
}
