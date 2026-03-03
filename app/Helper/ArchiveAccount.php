<?php

namespace App\Helper;


use App\Asset\PortfolioAsset;

use App\Wheel\HomeEquity;
use App\Wheel\IncomeAccount;
use App\Wheel\PensionAccount;
use App\Wheel\ProtectionAccount;
use App\Wheel\LiabilityAccount as Liability;
use App\Wheel\MortgageAccount as Mortgage;
use App\SevenG\DeptFin as Debt;
use App\Wheel\CashAccount;
use App\SevenG\BespokeKPI;
 
class ArchiveAccount{

    public static function cashArchiveAction($user, $header, $access, $account, $bespoke = null){
        if($header == "cakjsnodidjnjksnjbnxdjdbndjcbdbncfjn"){
            if($bespoke){
                $bespoke = BespokeKPI::where('user_id', $user->id)->where('id', $account)->first();
                if($bespoke){
                    $success = true; $info = '';
                    if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                        $info = 'The account has been Archived';  
                        $bespoke->isArchive = 1;
                        $bespoke->isAnalytics = 0;
                    }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                        $info = 'The account has been Unarchived';  
                        $bespoke->isArchive = 0;
                    } 
                    $bespoke->save();
                    WheelClass::updateCashTile($user);
                    return response()->json(compact('success', 'info'));
                }else{
                    $success = false; $info = 'Account not found';
                    return response()->json(compact('success', 'info'));
                }
            }else{
                $wheel_account =  CashAccount::where('user_id', $user->id)->where('id', $account)->first();
                if($wheel_account){
                    $success = true; $info = '';
                    if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                        $info = 'The account has been Archived';  $wheel_account->isArchive = 1;
                    }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                        $info = 'The account has been Unarchived';  $wheel_account->isArchive = 0;
                    }
                    $wheel_account->save();
                    WheelClass::updateCashTile($user);
                    return response()->json(compact('success', 'info'));
                }else{
                    $success = false; $info = 'Account not found';
                    return response()->json(compact('success', 'info'));
                }
            }
        }
    }

    public static function liabilityArchiveAction($user, $header, $access, $account, $bespoke = null){     
        if($header == "ajnkxbjknjsxnbjjkaznjknajhnbjbdhjb"){
            if($bespoke){
                $bespoke = BespokeKPI::where('user_id', $user->id)->where('id', $account)->first();
                if($bespoke){
                    $success = true; $info = '';
                    if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                        $info = 'The account has been Archived';  
                        $bespoke->isArchive = 1;
                        $bespoke->isAnalytics = 0;
                    }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                        $info = 'The account has been Unarchived';  $bespoke->isArchive = 0;
                    }
                    $bespoke->save();
                    WheelClass::updateLiabilityTile($user);
                    return response()->json(compact('success', 'info'));
                }else{ 
                    $success = false; $info = 'Account not found';
                    return response()->json(compact('success', 'info'));
                }
            }else{
                $wheel_account =  Liability::where('user_id', $user->id)->where('id', $account)->first();
                if($wheel_account){
                    $success = true; $info = '';
                    if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                        $info = 'The account has been Archived';  $wheel_account->isArchive = 1;
                    }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                        $info = 'The account has been Unarchived';  $wheel_account->isArchive = 0;
                    }
                    $wheel_account->save();
                    if($wheel_account->credit_id == 1){
                        WheelClass::updateLiabilityTile($user, $account);
                    }else{
                        WheelClass::updateLiabilityTile($user);
                    }
                    return response()->json(compact('success', 'info'));
                }else{
                    $success = false; $info = 'Account not found';
                    return response()->json(compact('success', 'info'));
                }
            }
        }
    }

    public static function mortgageArchiveAction($user, $header, $access, $account){
        if($header == "uiwjsbjsbnjmsxnjsxbnsjxbsxhjndghbdgjvhgcghdchm"){
            if($account > 0){
                $wheel_account =  Mortgage::where('user_id', $user->id)->where('id', $account)->first();
            }else{ 
                $wheel_account = Debt::where('user_id', $user->id)->first();
            } 
            if($wheel_account){
                $success = true; $info = '';
                if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                    $info = 'The account has been Archived';  $wheel_account->isArchive = 1;
                }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                    $info = 'The account has been Unarchived';  $wheel_account->isArchive = 0;
                }
                $wheel_account->save();
                WheelClass::updateMortgageTile($user);
                return response()->json(compact('success', 'info'));
            }else{
                $success = false; $info = 'Account not found';
                return response()->json(compact('success', 'info'));
            }
        }
    }

    public static function protectionArchiveAction($user, $header, $access, $account){
        if($header == "pwsijedijierujsxhjndgmbhhgcghdchnsbdgjvjxbsx"){
            $wheel_account =  ProtectionAccount::where('user_id', $user->id)->where('id', $account)->first();
            if($wheel_account){
                $success = true; $info = '';
                if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                    $info = 'The account has been Archived';  $wheel_account->isArchive = 1;
                }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                    $info = 'The account has been Unarchived';  $wheel_account->isArchive = 0;
                }
                $wheel_account->save();
                WheelClass::updateProtectionTile($user);
                return response()->json(compact('success', 'info'));
            }else{
                $success = false; $info = 'Account not found';
                return response()->json(compact('success', 'info'));
            }
        }
    }

    public static function pensionArchiveAction($user, $header, $access, $account){
        if($header == "pwiuduihdnjhnsbdgjvjxbsngmbhhgkhdccghdx"){
            $wheel_account =  PensionAccount::where('user_id', $user->id)->where('id', $account)->first();
            if($wheel_account){
                $success = true; $info = '';
                if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                    $info = 'The account has been Archived';  $wheel_account->isArchive = 1;
                }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                    $info = 'The account has been Unarchived';  $wheel_account->isArchive = 0;
                }
                $wheel_account->save(); 
                WheelClass::updatePensionTile($user);
                return response()->json(compact('success', 'info'));
            }else{
                $success = false; $info = 'Account not found';
                return response()->json(compact('success', 'info'));
            }
        }
    }

    public static function incomeArchiveAction($user, $header, $access, $account){
        if($header == "inakjkxbnjksbxjnbsjxnbxjcbnxcjbnxcjhbxnmc"){
            $wheel_account =  IncomeAccount::where('user_id', $user->id)->where('id', $account)->first();
            if($wheel_account){ 
                $success = true; $info = '';
                if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                    $info = 'The account has been Archived';  $wheel_account->isArchive = 1;
                }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                    $info = 'The account has been Unarchived';  $wheel_account->isArchive = 0;
                }
                $wheel_account->save();  
                WheelClass::updateIncomeTile($user, false); //return;
                return response()->json(compact('success', 'info'));
            }else{
                $success = false; $info = 'Account not found';
                return response()->json(compact('success', 'info'));
            }
        }
    } 
    
    public static function portfolioArchiveAction($user, $header, $access, $account){
        if($header == "pasjknmxjknjzkxnjxnjzhxnxcfdxajknknniojakn"){
            // Log::info($account);
            $wheel_account =  PortfolioAsset::where('user_id', $user->id)->where('id', $account)->first();
            
            if($wheel_account){ 
                $income_account =  IncomeAccount::where('user_id', $user->id)->where('portfolio_asset_id', $wheel_account->id)->first();
                $success = true; $info = '';
                if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                    $info = 'The account has been Archived';  
                    $wheel_account->isArchive = 1;
                    if($income_account) $income_account->isArchive = 1;
                }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                    $info = 'The account has been Unarchived';  
                    $wheel_account->isArchive = 0;
                    if($income_account) $income_account->isArchive = 0;
                }
                $wheel_account->save();  
                if($income_account) $income_account->save();  
                WheelClass::updateIncomeTile($user, false);
                return response()->json(compact('success', 'info'));
            }else{
                $success = false; $info = 'Account not found';
                return response()->json(compact('success', 'info'));
            }
        }
    }

    public static function equityArchiveAction($user, $header, $access, $account){
        if($header == "equhbvkjhvjhcfhxcfhgcfcvfcvgvbnstrgxfjbhmn"){
            $wheel_account =  HomeEquity::where('user_id', $user->id)->where('id', $account)->first();
            if($wheel_account){
                $success = true; $info = '';
                if($access == "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb"){
                    $info = 'The account has been Archived';  $wheel_account->isArchive = 1;
                }elseif($access == "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx"){
                    $info = 'The account has been Unarchived';  $wheel_account->isArchive = 0;
                }
                $wheel_account->save();
                // WheelClass::updateProtectionTile($user);
                return response()->json(compact('success', 'info'));
            }else{
                $success = false; $info = 'Account not found';
                return response()->json(compact('success', 'info'));
            }
        }
    }
}