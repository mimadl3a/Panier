<?php

namespace Panier\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Panier\AdminBundle\Entity\Produit;
use Panier\AdminBundle\Entity\Commande;
use Panier\AdminBundle\Entity\LigneCommande;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Panier\AdminBundle\classes\Panier;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager()->getRepository('PanierAdminBundle:Produit');
    	$prods = $em->findBy(array('libelle' => 'A'), null, 1);
        return $this->render('PanierFrontBundle:Default:index.html.twig', 
        	array(
        		'produits' => $prods
        	)
        );
    }
    public function ajouterAction(Request $request){
    	$panier = new Panier();

    	$session = $panier->getSession();
    	if(count($session->get('panier'))==0){
    		$panier->creationPanier();
    	}

		//echo count($session->get('panier'))."<br>";
		//echo $session->getId();
    	//$session->invalidate();

    	if ($request->getMethod() == 'GET') {

            $libelle = $request->get('libelle');
            $taille = $request->get('taille');
            $couleur = $request->get('couleur');
            $qte = $request->get('qte');
            $prix = $request->get('prix');

            $panier->ajouterArticle($libelle,$taille,$couleur,$qte,$prix);

            //$panier->modifierQTeArticle($libelle,10,"Taza-az-BLANC");
            //echo "<br>".$panier->MontantGlobal();
            //echo "<br>".$panier->compterArticles();
    	}
    	
    	echo "<br><br>";
    	var_dump($session->get('panier'));
    	return new response("");
    }
    public function panierAction(){
        $panier = new Panier();
        $session = $panier->getSession();
        if(count($session->get('panier'))==0){
            $panier->creationPanier();
        }
        $session = $panier->getSession();

        return $this->render('PanierFrontBundle:Default:panier.html.twig', 
            array(
                'panier' => $session->get('panier')
            )
        );
    }
    public function supprimerAction($detail){
        $panier = new Panier();
        $session = $panier->getSession();
        if(count($session->get('panier'))==0){
            $panier->creationPanier();
        }
        $panier->supprimerArticle($detail);
        return $this->redirect($this->generateUrl('panier_front_panier'));
    }
    public function modifierQteAction(Request $request){
        if ($request->getMethod() == 'POST') {
            $qte = $request->get('q');

            if (is_array($qte)){
                $QteArticle = array();
                $i=0;
                foreach ($qte as $contenu){
                    $QteArticle[$i++] = intval($contenu);
                }
            }else{
                $qte = intval($qte);
            }

            $p = new Panier();
            $session = $p->getSession();
            $panier = $session->get('panier');

            for ($i = 0 ; $i < count($QteArticle) ; $i++){
                $p->modifierQTeArticle($panier['libelleProduit'][$i],round($QteArticle[$i]),$panier['detail'][$i]);
            }
        }
        return $this->redirect($this->generateUrl('panier_front_panier'));
    }
    public function saveCartAction(){
        $em = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()
                           ->getRepository('PanierAdminBundle:Produit');
        $produit = $repository->findOneByLibelle('A');

        $cmd = new Commande();
        $cmd->setMontant(1000)
            ->setModePaiement("Normal");

        $em->persist($cmd);

        $p = new Panier();
        $session = $p->getSession();
        $panier = $session->get('panier');

        for ($i = 0 ; $i < count($panier['libelleProduit']) ; $i++){
            $lc[$i] = new LigneCommande();

            $lc[$i]->setQuantite($panier['qteProduit'][$i]);
            $lc[$i]->setPrixUnitaire($panier['prixProduit'][$i]);
            $lc[$i]->setCommande($cmd);
            $lc[$i]->setProduit($produit);
            $em->persist($lc[$i]);
        }
        

        $em->flush();
        return new Response("Commande sauvegardée");
    }
}
