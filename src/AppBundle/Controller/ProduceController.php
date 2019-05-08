<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\ProduceItem;
use AppBundle\Form\ProduceItemType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProduceController extends BaseController {

  /**
  * @Route("/produce", name="produce")
  */
  public function new(Request $request) {

    $item = new ProduceItem("", new \DateTime("today"), "");

    $form = $this->createForm(ProduceItemType::class, $item);

    $form->handleRequest($request);

    if($form->isSubmitted()) {

      $entityManager = $this->getDoctrine()->getManager();

      $entityManager->persist($icon);

      $entityManager->flush();

      $imageFile = $item->getIcon();

      $fileName = md5(uniqid()) . '.' . $imageFile->guessExtension();

      $rootDirPath = $this->get('kernel')->getRootDir() . '/../public/uploads';

      $imageFile->move($rootDirPath, $fileName);

      $item->setIcon($fileName);

      $item->getInShoppingList();

      $item->setInShoppingList();

      return new Response(
        '<html><body>New produce item was added: '. $item->getName(). ' on ' . $item->getExpirationDate()->format('Y-m-d') .
        ' Hashed file name: ' . $item->getIcon() . '<img src="/uploads/' . $item->getIcon() . $item->getId() . $item->getInShoppingList() . '"/></body></html>'
      );
    }

    return $this->render('item.html.twig', ['produceItem_form' => $form->createView()]);

  }

  /**
  * @Route("/produceItem", name="produceItem")
  */
  public function list(Request $request) {
    $repository = $this->getDoctrine()->getRepository(ProduceItem::class);

    $produceItems = $repository->findAll();

    return $this->render('produce/list.html.twig', ['produceItems' => $produceItems]);
  }

  /**
  * @Route("/produceItem/{produceItem}", name="produceItem")
  */
  public function listByProduceItem(Request $request, $produceItem) {
    $repository = $this->getDoctrine()->getRepository(ProduceItem::class);

    $produceItems = $repository->findAllProduceItemsByProduce($produceItem);

    return $this->render('produce/list.html.twig', ['produceItems' => $produceItems]);
  }


  /**
  * @Route("/produce/{id}", name="get_produce")
  */
  public function getProduce(int $id) {
    $repository = $this->getDoctrine()->getRepository(ProduceItem::class);

    $produceItem = $repository->find($id);

    return $this->render('produce/produce.html.twig', ['produceItem' => $produceItem]);
  }
}
