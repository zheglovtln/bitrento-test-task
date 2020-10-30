<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class BlogController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('blog/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("post/new", name="post_new",methods={"GET","POST"})
     *
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request) {
        $post = new Post();
        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class,
                array('attr' => array('class' => 'form-control')))
            ->add('content', TextareaType::class, array(
                    'required' => false,
                    'attr' => array('class' => 'form-control')
            ))
            ->add('add', SubmitType::class, array(
                'label' => 'Add',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ))->getForm();
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                $form = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($post);
                $entityManager->flush();
                return $this->redirectToRoute('home');
        }
        return $this->render('blog/post/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("post/edit/{id}", name="post_edit",methods={"GET","POST"})
     *
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, $id) {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);
        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class,
                array('attr' => array('class' => 'form-control')))
            ->add('content', TextareaType::class, array(
                'required' => false,
                'attr' => array('class' => 'form-control')
            ))
            ->add('add', SubmitType::class, array(
                'label' => 'Edit',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ))->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('blog/post/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/post/delete/{id}", name="post_delete",methods={"DELETE"})
     *
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, $id) {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($post);
        $entityManager->flush();
        return $this->redirectToRoute('/post/'.$id);

    }

    /**
     * @Route("post/{id}", name="post_show", methods={"POST","GET"})
     */
    public function show($id) {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);
        return $this->render('blog/post/show.html.twig', [
            'post' => $post,

        ]);
    }
}
