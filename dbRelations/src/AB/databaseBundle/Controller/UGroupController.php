<?php

namespace AB\databaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AB\databaseBundle\Entity\UGroup;
use AB\databaseBundle\Form\UGroupType;

/**
 * UGroup controller.
 *
 * @Route("/ugroup")
 */
class UGroupController extends Controller
{

    /**
     * Lists all UGroup entities.
     *
     * @Route("/", name="ugroup")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ABdatabaseBundle:UGroup')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new UGroup entity.
     *
     * @Route("/", name="ugroup_create")
     * @Method("POST")
     * @Template("ABdatabaseBundle:UGroup:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new UGroup();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ugroup_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a UGroup entity.
     *
     * @param UGroup $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UGroup $entity)
    {
        $form = $this->createForm(new UGroupType(), $entity, array(
            'action' => $this->generateUrl('ugroup_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UGroup entity.
     *
     * @Route("/new", name="ugroup_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new UGroup();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a UGroup entity.
     *
     * @Route("/{id}", name="ugroup_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABdatabaseBundle:UGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing UGroup entity.
     *
     * @Route("/{id}/edit", name="ugroup_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABdatabaseBundle:UGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UGroup entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a UGroup entity.
    *
    * @param UGroup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UGroup $entity)
    {
        $form = $this->createForm(new UGroupType(), $entity, array(
            'action' => $this->generateUrl('ugroup_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UGroup entity.
     *
     * @Route("/{id}", name="ugroup_update")
     * @Method("PUT")
     * @Template("ABdatabaseBundle:UGroup:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABdatabaseBundle:UGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ugroup_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a UGroup entity.
     *
     * @Route("/{id}", name="ugroup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABdatabaseBundle:UGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ugroup'));
    }

    /**
     * Creates a form to delete a UGroup entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ugroup_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
