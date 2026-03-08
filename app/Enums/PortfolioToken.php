<?php

namespace App\Enums;

/**
 * All magic string tokens used across PortfolioApi and PortfolioHelper.
 * Replace hardcoded strings in frontend calls with these constants.
 */
class PortfolioToken
{
    // -------------------------------------------------------------------------
    // Period/Record action header (braidInformation & addNewRecordPeriod)
    // -------------------------------------------------------------------------
    const PERIOD_HEADER = 'ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn';

    // Access tokens for period actions
    const ACCESS_CURRENT_PERIOD  = 'current_ajjaknjkxbnjnksxknmcfaz';
    const ACCESS_CHECK_PERIOD    = 'addperiod_ajhbxsjnbjsxbnoaklmsikn';
    const ACCESS_ADD_NEW_PERIOD  = 'addnewperiodadd_ajhbxsjbhnsjhbjbnsxjk';

    // -------------------------------------------------------------------------
    // Non-portfolio period action (IncomeHelper::addNewNonPortfolioRecord)
    // -------------------------------------------------------------------------
    const ACCESS_NP_CHECK_PERIOD = 'checkperiod_ajhbxsjnbjsxbnoaklmsikn';
    const ACCESS_NP_ADD_PERIOD   = 'addnewperiodadd_ajhbxsjbhnsjhbjbnsxjk';

    // -------------------------------------------------------------------------
    // SevenG / Bespoke discriminator tokens (LiabilitiesApi::updateLiability)
    // -------------------------------------------------------------------------
    const SEVENG_CREDIT_TOKEN    = 'pakmamkanknmjkmnzkmnjmnd';
    const BESPOKE_LIABILITY_TOKEN = 'lapakoihangbshjbsxhgbxuhxbshxbxujahnzoazjmsozklnsz';

    // -------------------------------------------------------------------------
    // BRAID asset classes (valid values for asset_class field)
    // -------------------------------------------------------------------------
    const CLASS_BUSINESS     = 'business';
    const CLASS_RISK         = 'risk';
    const CLASS_APPRECIATING = 'appreciating';
    const CLASS_INTELLECTUAL = 'intellectual';
    const CLASS_DEPRECIATING = 'depreciating';

    const BRAID_CLASSES = [
        self::CLASS_BUSINESS,
        self::CLASS_RISK,
        self::CLASS_APPRECIATING,
        self::CLASS_INTELLECTUAL,
        self::CLASS_DEPRECIATING,
    ];

    // -------------------------------------------------------------------------
    // Asset categories
    // -------------------------------------------------------------------------
    const CATEGORY_EXISTING = 'existing';
    const CATEGORY_DESIRED  = 'desired';
}