<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\TransactionType;
use AppBundle\Form\TransactionTypeType;

/**
 * TransactionType controller.
 *
 */
class TransactionTypeController extends Controller
{
    /**
     * Lists all TransactionType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transactionTypes = $em->getRepository('AppBundle:TransactionType')->findAll();

        return $this->render('transactiontype/index.html.twig', array(
            'transactionTypes' => $transactionTypes,
        ));
    }

    /**
     * Creates a new TransactionType entity.
     *
     */
    public function newAction(Request $request)
    {
        $transactionType = new TransactionType();
        $form = $this->createForm('AppBundle\Form\TransactionTypeType', $transactionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transactionType);
            $em->flush();

            return $this->redirectToRoute('transaction_type_show', array('id' => $transactionType->getId()));
        }

        return $this->render('transactiontype/new.html.twig', array(
            'transactionType' => $transactionType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TransactionType entity.
     *
     */
    public function showAction(TransactionType $transactionType)
    {
        $deleteForm = $this->createDeleteForm($transactionType);

        return $this->render('transactiontype/show.html.twig', array(
            'transactionType' => $transactionType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TransactionType entity.
     *
     */
    public function editAction(Request $request, TransactionType $transactionType)
    {
        $deleteForm = $this->createDeleteForm($transactionType);
        $editForm = $this->createForm('AppBundle\Form\TransactionTypeType', $transactionType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transactionType);
            $em->flush();

            return $this->redirectToRoute('transaction_type_edit', array('id' => $transactionType->getId()));
        }

        return $this->render('transactiontype/edit.html.twig', array(
            'transactionType' => $transactionType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TransactionType entity.
     *
     */
    public function deleteAction(Request $request, TransactionType $transactionType)
    {
        $form = $this->createDeleteForm($transactionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($transactionType);
            $em->flush();
        }

        return $this->redirectToRoute('transaction_type_index');
    }

    /**
     * Creates a form to delete a TransactionType entity.
     *
     * @param TransactionType $transactionType The TransactionType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TransactionType $transactionType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transaction_type_delete', array('id' => $transactionType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
