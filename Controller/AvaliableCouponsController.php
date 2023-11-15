<?php
namespace Nncoupons\Controller;
use OxidEsales\Eshop\Core\Registry;
use oxRegistry;
use Nncoupons\Model\AvaliableCouponsModel;

class AvaliableCouponsController extends \OxidEsales\Eshop\Application\Controller\AccountController

{
 
    protected $_sThisTemplate = "@nncoupons/templates/displaycouponlist";

    public function render()
    {
        parent::render();
        $oUser = $this->getUser();
        if (!$oUser) {
            return $this->_sThisTemplate = $this->_sThisLoginTemplate;
        }
        
        $voucherModel = oxNew(AvaliableCouponsModel::class);
        $voucherSeriesData = $voucherModel->getVoucherSeriesData();
        
        $this->_aViewData["couponarray"] = $voucherSeriesData;

        return $this->_sThisTemplate;
    }
    public function getBreadCrumb()
    {
        $aPaths = [];
        $aPath = [];

        $oLang = \OxidEsales\Eshop\Core\Registry::getLang();
        $sSelfLink = $this->getViewConfig()->getSelfLink();

        $iBaseLanguage = $oLang->getBaseLanguage();
        $aPath['title'] = $oLang->translateString('MY_ACCOUNT', $iBaseLanguage, false);
        $aPath['link'] = \OxidEsales\Eshop\Core\Registry::getSeoEncoder()->getStaticUrl($sSelfLink . "cl=account");
        $aPaths[] = $aPath;

        $aPath['title'] = $oLang->translateString('AVALIABLE_COUPON_TITLE', null, false);
        $url = $this->getLink();
        $url = htmlspecialchars_decode($url);
        $aPath['link'] =$url;
        $aPaths[] = $aPath;

        return $aPaths;
    }



}
