<?php

namespace App\Controller;

use App\Entity\Pessoa;
use App\Form\PessoaType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;

class SiteController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, ManagerRegistry $registry)
    {
        $this->entityManager = $entityManager;
        $this->registry = $registry;
    }

    public function Home(EntityManagerInterface $entityManager)
    {
        $idpessoa = $entityManager->getRepository(Pessoa::class)->findAll();

        return $this->render('pessoa/list.html.twig', [
            'idpessoa' => $idpessoa
        ]);
    }

    public function cadastroPessoa(Request $request)
    {
        $idpessoa = new Pessoa();

        $form = $this->createFormBuilder()
            ->add('nome', TextType::class)
            ->add('cpf', TextType::class, [
                'label' => 'CPF',
                'constraints' => [
                    new Length([
                        'min' => 11,
                        'minMessage' => 'O CPF deve ter no mínimo 11 caracteres',
                        'max' => 11,
                        'maxMessage' => 'O CPF deve ter no máximo 11 caracteres'
                    ])
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $idpessoa
                    ->setNome($form->get('nome')->getData())
                    ->setCpf($form->get('cpf')->getData());

                $this->entityManager->persist($idpessoa);
                $this->entityManager->flush();

                $this->addFlash('success', 'Usuário cadastrado com sucesso');
            } catch (\Exception $exception) {
                $this->addFlash('error', 'Não foi possível cadastrar o usuário');
            }
        }

        return $this->render('site/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function alterarPessoa(Request $request, Pessoa $idpessoa)
    {
        $form = $this->createForm(PessoaType::class, $idpessoa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager = $this->entityManager;
                $entityManager->persist($idpessoa);
                $entityManager->flush();
                $this->addFlash('success', 'Usuário alterado com sucesso');
            } catch (\Exception $exception) {
                $this->addFlash('error', 'Usuário não foi alterado');
            }
        }

        return $this->render('pessoa/edit.html.twig', [
            'form' => $form->createView(),
            'idpessoa' => $idpessoa
        ]);
    }

    public function excluirPessoa(Request $request, Pessoa $idpessoa)
    {
        $entityManager = $this->entityManager;
        $entityManager->remove($idpessoa);
        $entityManager->flush();
        $this->addFlash('success', 'Usuário foi excluído com sucesso');

        return $this->redirectToRoute('Home');
    }

//    public function searchData(Request $request)
//    {
//        $searchTerm = $request->query->get('search');
//        $entityManager = $this->registry->getManagerForClass(Pessoa::class);
//        $idpessoa = $entityManager->getRepository(Pessoa::class)
//            ->findBy(['idpessoa' => $searchTerm]);
//
//        return $this->render('site/template.html.twig', [
//            'idpessoa' => $idpessoa
//        ]);
//    }

//    public function cadastroContato(Request $request)
//    {
//        $descricao = new contato();
//
//        $form = $this->createFormBuilder()
//            ->add('Numero_do_contato', TextType::class, [
//                'label' => 'Numero do contato',
//                'constraints' => [
//                    new Length([
//                        'min' => 9,
//                        'minMessage' => 'O Numero deve ter no mínimo 9 caracteres',
//                        'max' => 9,
//                        'maxMessage' => 'O Numero deve ter no máximo 9 caracteres'
//                    ])
//                ]
//            ])
//            ->getForm();
//
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            try {
//                $descricao
//                    ->setDescricao($form->get('Numero_do_contato')->getData());
//
//                $this->entityManager->persist($descricao);
//                $this->entityManager->flush();
//
//                $this->addFlash('success', 'Numero cadastrado com sucesso');
//            } catch (\Exception $exception) {
//                $this->addFlash('error', 'Não foi possível cadastrar o numero');
//            }
//        }
//
//        return $this->render('site/contato.html.twig', [
//            'form' => $form->createView()
//        ]);
//    }

}







