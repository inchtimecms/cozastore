<?php

namespace App\Controller\CozaController;


use App\Entity\CartEntity;
use App\Entity\UserEntity;
use App\Repository\ContentEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * 购物车
 */
class CartController extends BaseController
{
    /**
     * 前台添加到购物车功能,使用Ajax添加商品到购物车
     * @Route("/add/cart", name="add_to_cart", methods={"POST"})
     */
    public function addToCart(Request $request, ContentEntityRepository $contentEntityRepository, EntityManagerInterface $em)
    {
        if ($this->isCsrfTokenValid("add_to_cart", $request->request->get("token"))) {
            $user = $this->getUser();
            $cartEntity = new CartEntity();
            $cartEntity->setCreateAt(new \DateTime());
            $cartEntity->setBoolChecked(false);
            $cartEntity->setBuyer($user);
            $cartEntity->setChangeAt(new \DateTime());
            $cartEntity->setChoiceSaleProp($request->request->get("group1prop-select") . " " . $request->request->get("group2prop-select"));
            $cartEntity->setNumber($request->request->get("num-product"));
            $cartEntity->setProductContentEntity($contentEntityRepository->find($request->request->get("product-entity")));
            $cartEntity->setOrderEntity(null);

            $em->persist($cartEntity);
            $em->flush();

            return $this->json(array("message"=>"商品已成功加入购物车！"), 200);
        }else{
            return $this->json(array("message"=>"token错误,请刷新页面后再次添加购物车。"), 403);
        }
    }

    /**
     * 前台显示购物车,使用Ajax获取购物车中商品列表
     * @Route("/show/cart/list", name="show_cart_list")
     */
    public function showCartList(EntityManagerInterface $em)
    {
        /**@var UserEntity $user**/
        $user = $this->getUser();
        if (!$user){
            return $this->redirectToRoute("fos_user_security_login");
        }
        //过滤已结算过的商品
        /**@var CartEntity[] $cartEntities**/
        $cartEntities = $em->createQuery("SELECT c FROM App\Entity\CartEntity c WHERE c.buyer = :user AND c.boolChecked = false ORDER BY c.id DESC")
            ->setParameter("user", $user)
            ->getResult();
//        $cartEntitiesDataArray = array();
//        foreach ($cartEntities as $cartEntity){
//            $cartItemData = array(
//                "id" => $cartEntity->getId(),
//                "productContentTitle" => $cartEntity->getProductContentEntity()->getTitle(),
//                "productContentImg" => $cartEntity->getProductContentEntity()->getFieldImageTableEntitys()->first()->getFileManagedEntity()->getUri(),
//                "productContentId" => $cartEntity->getProductContentEntity()->getId(),
//                "productSalePropValue" => $cartEntity->getProductContentEntity()->getFieldProductPropsTableEntity()->getFieldProductPropsValue(),
//                "productChoiceProp" => $cartEntity->getChoiceSaleProp(),
//                "number" => $cartEntity->getNumber(),
//            );
//            array_push($cartEntitiesDataArray, $cartItemData);
//        }

        return $this->render("themes/cozastore/pages/cart.html.twig",[
            "baseController" => $this,
            "cartEntities" => $cartEntities,
            "system" => $this->getSystemEntity(),
            "mainMenu" => $this->getMainMenuEntity(),
        ]);
    }


}
