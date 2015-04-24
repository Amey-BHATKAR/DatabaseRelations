<?php

namespace AB\databaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


use AB\databaseBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DatabaseBasicController extends Controller {
	/**
	 * @Route("/")
	 * @Template()
	 */
	public function indexAction() {
		return array ();
	}
	
	/**
	 * @Route("/create")
	 * @Template()
	 */
	public function createAction() {
		$product = new Product ();
		$product->setName ( 'A Foo Bar' );
		$product->setPrice ( '19.99' );
		$product->setDescription ( 'Lorem ipsum dolor' );
		
		$em = $this->getDoctrine ()->getManager ();
		
		$em->persist ( $product );
		$em->flush ();
		
		return new Response ( 'Created product id ' . $product->getId () );
	}
	
	/**
	 * @Route("/show/{id}", requirements={"id" = "\d+"}, defaults={"id" = 1})
	 * @Template()
	 */
	public function showAction($id)
	{
		$product = $this->getDoctrine()
		->getRepository('ABdatabaseBundle:Product')
		->find($id);
	
		if (!$product) {
			throw $this->createNotFoundException(
					'No product found for id '.$id
			);
		}
	
		return new Response ( 'Product id: ' . $product->getId () . '<br>Product Name: ' . $product->getName () .
								 '<br>Product Price: ' . $product->getPrice() . '<br>Product Description: ' . $product->getDescription ());
		// ... do something, like pass the $product object into a template
	}
}
