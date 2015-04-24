<?php

namespace AB\databaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


use AB\databaseBundle\Entity\Product;
use AB\databaseBundle\Entity\User;
use AB\databaseBundle\Entity\Address;

use Symfony\Component\HttpFoundation\Response;

class DatabaseComplexController extends Controller {
	
	/**
	 * @Route("/manyToOne")
	 * @Template()
	 */
	public function manyToOneAction() {
		/* $product = new Product ();
		$product->setName ( 'A Foo Bar' );
		$product->setPrice ( '19.99' );
		$product->setDescription ( 'Lorem ipsum dolor' );
		
		$em = $this->getDoctrine ()->getManager ();
		
		$em->persist ( $product );
		$em->flush ();
		
		return new Response ( 'Created product id ' . $product->getId () ); */
		
		return array ();
	}
	
	/**
	 * @Route("/oneToOne")
	 * @Template()
	 */
	public function oneToOneAction() {
		/* $product = new Product ();
			$product->setName ( 'A Foo Bar' );
		$product->setPrice ( '19.99' );
		$product->setDescription ( 'Lorem ipsum dolor' );
	
		$em = $this->getDoctrine ()->getManager ();
	
		$em->persist ( $product );
		$em->flush ();
	
		return new Response ( 'Created product id ' . $product->getId () ); */
	
		return array ();
	}
	
	
}
