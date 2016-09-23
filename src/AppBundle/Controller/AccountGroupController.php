<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\AccountGroup;
use AppBundle\Form\AccountGroupType;
use Symfony\Component\HttpKernel\Exception\HttpException;
/**
 * AccountGroup controller.
 *
 */
class AccountGroupController extends Controller
{
    /**
     * Lists all AccountGroup entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $accountGroups = $em->getRepository('AppBundle:AccountGroup')->findAll();

        return $this->render('accountgroup/index.html.twig', array(
            'accountGroups' => $accountGroups,
        ));
    }

    /**
     * Creates a new AccountGroup entity.
     *
     */
    public function newAction(Request $request)
    {
        $accountGroup = new AccountGroup();
        $form = $this->createForm('AppBundle\Form\AccountGroupType', $accountGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $level = null;
            $code  = null;
            /* Determine the level and set */
            if ($accountGroup->getParent()) {
                $level = $accountGroup->getParent()->getLevel() + 1;
                $code = $em->getRepository('AppBundle:AccountGroup')->getCode($accountGroup->getParent());
            } else {
                $level = 0;
                $code = $em->getRepository('AppBundle:AccountGroup')->getCode($accountGroup->getParent());
            }
            $accountGroup->setType($accountGroup->getParent()->getType());
            $accountGroup->setLevel($level);
            $accountGroup->setCode($code);
            $em->persist($accountGroup);
            $em->flush();

            return $this->redirectToRoute('account_group_show', array('id' => $accountGroup->getId()));
        }

        return $this->render('accountgroup/new.html.twig', array(
            'accountGroup' => $accountGroup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AccountGroup entity.
     *
     */
    public function showAction(AccountGroup $accountGroup)
    {
        $deleteForm = $this->createDeleteForm($accountGroup);

        return $this->render('accountgroup/show.html.twig', array(
            'accountGroup' => $accountGroup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AccountGroup entity.
     *
     */
    public function editAction(Request $request, AccountGroup $accountGroup)
    {
        $deleteForm = $this->createDeleteForm($accountGroup);
        $editForm = $this->createForm('AppBundle\Form\AccountGroupType', $accountGroup);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        /* Check if the Parent passed exists in Parent Group ID */

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /* Determine the level and set */
            if ($accountGroup->getParent()) {
                $level = $accountGroup->getParent()->getLevel() + 1;
                $code = $em->getRepository('AppBundle:AccountGroup')->getCode($accountGroup->getParent());
            } else {
                $level = 0;
                $code = $em->getRepository('AppBundle:AccountGroup')->getCode($accountGroup->getParent());
            }
            $accountGroup->setType($accountGroup->getParent()->getType());
            $accountGroup->setCode($code);

            $em->persist($accountGroup);
            $em->flush();

            return $this->redirectToRoute('account_group_edit', array('id' => $accountGroup->getId()));
        }

        return $this->render('accountgroup/edit.html.twig', array(
            'accountGroup' => $accountGroup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AccountGroup entity.
     *
     */
    public function deleteAction(Request $request, AccountGroup $accountGroup)
    {
        $form = $this->createDeleteForm($accountGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($accountGroup);
            $em->flush();
        }

        return $this->redirectToRoute('account_group_index');
    }

    /**
     * Creates a form to delete a AccountGroup entity.
     *
     * @param AccountGroup $accountGroup The AccountGroup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AccountGroup $accountGroup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('account_group_delete', array('id' => $accountGroup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
