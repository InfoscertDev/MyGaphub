<?php

namespace App\Enums;

/**
 * Archive action tokens used to authenticate archive/unarchive requests.
 * These replace the magic strings previously scattered across ArchiveAccount.
 */
class ArchiveToken
{
    // --- Access action tokens (shared across all account types) ---
    const ARCHIVE   = 'uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb';
    const UNARCHIVE = 'atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx';

    // --- Header tokens (identify which account type is being acted on) ---
    const CASH        = 'cakjsnodidjnjksnjbnxdjdbndjcbdbncfjn';
    const LIABILITY   = 'ajnkxbjknjsxnbjjkaznjknajhnbjbdhjb';
    const MORTGAGE    = 'uiwjsbjsbnjmsxnjsxbnsjxbsxhjndghbdgjvhgcghdchm';
    const PROTECTION  = 'pwsijedijierujsxhjndgmbhhgcghdchnsbdgjvjxbsx';
    const PENSION     = 'pwiuduihdnjhnsbdgjvjxbsngmbhhgkhdccghdx';
    const INCOME      = 'inakjkxbnjksbxjnbsjxnbxjcbnxcjbnxcjhbxnmc';
    const PORTFOLIO   = 'pasjknmxjknjzkxnjxnjzhxnxcfdxajknknniojakn';
    const EQUITY      = 'equhbvkjhvjhcfhxcfhgcfcvfcvgvbnstrgxfjbhmn';

    // --- Allocation confirmation tokens ---
    const ALLOCATION_CRD = 'ajkmzxjkcnkfsnznnjksxnjnkcnjc';
    const ALLOCATION_ALO = 'azsjkhbdjcbjszbhjbxjhcbjbhhbjghdx';
}