<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\TransactionTypeGroup;
use AppBundle\Form\TransactionTypeGroupType;

/**
 * TransactionTypeGroup controller.
 *
 */
class TransactionTypeGroupController extends Controller
{
    /**
     * Lists all TransactionTypeGroup entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transactionTypeGroups = $em->getRepository('AppBundle:TransactionTypeGroup')->findAll();

        return $this->render('transactiontypegroup/index.html.twig', array(
            'transactionTypeGroups' => $transactionTypeGroups,
        ));
    }

    /**
     * Creates a new TransactionTypeGroup entity.
     *
     */
    public function newAction(Request $request)
    {
        $transactionTypeGroup = new TransactionTypeGroup();
        $form = $this->createForm('AppBundle\Form\TransactionTypeGroupType', $transactionTypeGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transactionTypeGroup);
            $em->flush();

            return $this->redirectToRoute('transaction_type_group_show', array('id' => $transactionTypeGroup->getId()));
        }

        return $this->render('transactiontypegroup/new.html.twig', array(
            'transactionTypeGroup' => $transactionTypeGroup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TransactionTypeGroup entity.
     *
     */
    public function showAction(TransactionTypeGroup $transactionTypeGroup)
    {
        $deleteForm = $this->createDeleteForm($transactionTypeGroup);

        return $this->render('transactiontypegroup/show.html.twig', array(
            'transactionTypeGroup' => $transactionTypeGroup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TransactionTypeGroup entity.
     *
     */
    public function editAction(Request $request, TransactionTypeGroup $transactionTypeGroup)
    {
        $deleteForm = $this->createDeleteForm($transactionTypeGroup);
        $editForm = $this->createForm('AppBundle\Form\TransactionTypeGroupType', $transactionTypeGroup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transactionTypeGroup);
            $em->flush();

            return $this->redirectToRoute('transaction_type_group_edit', array('id' => $transactionTypeGroup->getId()));
        }

        return $this->render('transactiontypegroup/edit.html.twig', array(
            'transactionTypeGroup' => $transactionTypeGroup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TransactionTypeGroup entity.
     *
     */
    public function deleteAction(Request $request, TransactionTypeGroup $transactionTypeGroup)
    {
        $form = $this->createDeleteForm($transactionTypeGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($transactionTypeGroup);
            $em->flush();
        }

        return $this->redirectToRoute('transaction_type_group_index');
    }

    /**
     * Creates a form to delete a TransactionTypeGroup entity.
     *
     * @param TransactionTypeGroup $transactionTypeGroup The TransactionTypeGroup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TransactionTypeGroup $transactionTypeGroup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transaction_type_group_delete', array('id' => $transactionTypeGroup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
