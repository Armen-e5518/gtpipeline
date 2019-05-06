<?php
/**
 * Created by PhpStorm.
 * User: Armen
 * Date: 11/20/17
 * Time: 12:00 PM
 */

namespace frontend\components;

use yii\base\Component;

/**
 * Class CheckRules
 * @package frontend\components
 */
class DropdownData extends Component
{
   public static function client_industry()
   {
      return [
         'Client industry 1',
         'Client industry 2',
      ];
   }

   public static function client_segment()
   {
      return [
         'Financial organization',
         'International Financial Institution',
         'Non-profit organization',
         'Private organization',
         'Public organization',
         'State and Governmental institution',
      ];
   }

   public static function Project_sectors()
   {
      return [
         'Agriculture',
         'Chemical industry',
         'Construction',
         'Education',
         'Energy',
         'Financial services',
         'Food and beverage, tobacco',
         'Healthcare',
         'Hospitality, tourism, catering',
         'Mining ',
         'Oil and gas',
         'Production and manufacturing',
         'Railway',
         'Retail',
         'Transport',
         'Telecommunication and postal',
         'Utilities (water, gas, electricity, etc.)',
         'Water',
      ];
   }
   public static function service_line()
   {
      return [
         'Please make it editable, so we could add services',
         'Business consulting services',
         'Business risk services',
         'Cybersecurity',
         'Recovery & reorganisation',
         'Transactional advisory services',
      ];
   }

   public static function selection_method()
   {
      return [
         'List cost selection (LCS)',
         'Quality and Cost Based selection (QCBS)',
         'Quality Based Selection (QBS)',
         'Fixed Budget Selection (FBS)',
         'Single Source Selection (SSS)',
      ];
   }

   public static function submission_method()
   {
      return [
         'Hard Copy',
         'Electronic via email',
         'Electronic via procurement system',
         'Both hard copy and electronic',
      ];
   }
   public static function required_format()
   {
      return [
         'Full proposal',
         'Letter format',
         'Simplified  proposal ',
         'Required format proposal',
      ];
   }
   public static function required_language()
   {
      return [
         'Armenian',
         'English',
         'Russian ',
         'Other local language',
         'Armenian and Russian',
         'English and Russian',
         'English and Armenian',
         'English and local',
      ];
   }
   public static function name_firm()
   {
      return [
         'Grant Thornton CJSC',
         'Grant Thornton Consulting CJSC',
         'Grant Thornton Legal & Tax LLC',
         'Other (To Be filled in)',
      ];
   }
   public static function project_components()
   {
      return [
         'Please make it editable, so we could add components',
         'Feasibility study',
         'Business plan',
         'Valuation',
         'Due Diligence',
         'HR Consulting',
         'Provision of trainings',
         'Market Study',
         'Development of manuals',
      ];
   }

}
