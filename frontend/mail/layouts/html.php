<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>

<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!-- NAME: WEEKLY DEALS -->
    <!--[if gte mso 15]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG />
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grant Torenton</title>
    <?php $this->head() ?>
    <style type="text/css">
        p{
            margin:10px 0;
            padding:0;
        }
        table{
            border-collapse:collapse;
        }

        table td {
            border-collapse: collapse;
        }
        h1,h2,h3,h4,h5,h6{
            display:block;
            margin:0;
            padding:0;
            font-weight: normal;
        }
        img,a img{
            border:0;
            height:auto;
            outline:none;
            text-decoration:none;
        }
        body,#bodyTable,#bodyCell{
            height:100%;
            margin:0;
            padding:0;
            width:100%;
        }
        .mcnPreviewText{
            display:none !important;
        }
        #outlook a{
            padding:0;
        }
        img{
            -ms-interpolation-mode:bicubic;
        }
        table{
            mso-table-lspace:0;
            mso-table-rspace:0;
        }
        .ReadMsgBody{
            width:100%;
        }
        .ExternalClass{
            width:100%;
        }
        p,a,li,td,blockquote{
            mso-line-height-rule:exactly;
        }
        a[href^=tel],a[href^=sms]{
            color:inherit;
            cursor:default;
            text-decoration:none;
        }
        p,a,li,td,body,table,blockquote{
            -ms-text-size-adjust:100%;
            -webkit-text-size-adjust:100%;
        }
        .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
            line-height:100%;
        }
        a[x-apple-data-detectors]{
            color:#ffffff !important;
            text-decoration:none !important;
            font-size:inherit !important;
            font-family:inherit !important;
            font-weight:inherit !important;
            line-height:inherit !important;
        }
        #bodyCell{
            padding:0;
        }
        .templateContainer{
            max-width:800px !important;
        }
        a.mcnButton{
            display:block;
        }
        .mcnImage{
            vertical-align:bottom;
        }
        .mcnTextContent{
            word-break:break-word;
        }
        .mcnTextContent img{
            height:auto !important;
        }
        .mcnDividerBlock{
            table-layout:fixed !important;
        }
        /*
        @tab Page
        @section Background Style
        @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        body,#bodyTable{
            /*@editable*/background-color:#fff;
            /*@editable*/font-family:Arial, serif;
        }
        /*
        @tab Page
        @section Background Style
        @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        #bodyCell{
            /*@editable*/border-top:0;
        }
        /*
        @tab Page
        @section Email Border
        @tip Set the border for your email.
        */
        .templateContainer{
            /*@editable*/border:0;
            background-color: #fff;
        }

        /*
        @tab Preheader
        @section Preheader Style
        @tip Set the background color and borders for your email's preheader area.
        */
        #templatePreheader{
            /*@editable*/background-color:#fff;
            /*@editable*/background-image:none;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
            /*@editable*/padding-top:9px;
            /*@editable*/padding-bottom:9px;
        }
        /*
        @tab Preheader
        @section Preheader Text
        @tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
        */
        #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
            /*@editable*/color:#656565;
            /*@editable*/font-family:Arial, serif;
            /*@editable*/font-size:12px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
        @section Preheader Link
        @tip Set the styling for your email's preheader links. Choose a color that helps them stand out from your text.
        */
        #templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
            /*@editable*/color:#656565;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Header
        @section Header Style
        @tip Set the background color and borders for your email's header area.
        */
        #templateHeader{
            /*@editable*/background-color:#fff;
            /*@editable*/background-repeat:no-repeat;
            /*@editable*/background-position:center;
            /*@editable*/background-size:cover;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
            /*@editable*/padding-top:0;
        }
        /*
        @tab Header
        @section Header Text
        @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
        */
        #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
            /*@editable*/color:#fff;
            /*@editable*/font-family:Arial, serif;
            /*@editable*/font-size:15px;
            /*@editable*/line-height:130%;
            /*@editable*/text-align:right;
        }
        /*
        @tab Header
        @section Header Link
        @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        #templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
            /*@editable*/color:#404040;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Body
        @section Body Style
        @tip Set the background color and borders for your email's body area.
        */
        #templateBody{
            /*@editable*/background-image:none;
            /*@editable*/background-repeat:no-repeat;
            /*@editable*/background-position:center;
            /*@editable*/background-size:cover;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
            /*@editable*/padding-top:10px;
            /*@editable*/padding-bottom:0;
        }
        /*
        @tab Body
        @section Body Text
        @tip Set the styling for your email's body text. Choose a size and color that is easy to read.
        */
        #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
            /*@editable*/color:#111111;
            /*@editable*/font-family:Arial, serif;
            /*@editable*/font-size:16px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Body
        @section Body Link
        @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
        */
        #templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
            /*@editable*/color:#AAAAAA;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Columns
        @section Column Style
        @tip Set the background color and borders for your email's columns.
        */
        #templateColumns{
            /*@editable*/background-color:#04162b;
            /*@editable*/background-image:none;
            /*@editable*/background-repeat:no-repeat;
            /*@editable*/background-position:center;
            /*@editable*/background-size:cover;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
            /*@editable*/padding-top:0;
            /*@editable*/padding-bottom:9px;
        }
        /*
        @tab Columns
        @section Column Text
        @tip Set the styling for your email's column text. Choose a size and color that is easy to read.
        */
        #templateColumns .columnContainer .mcnTextContent,#templateColumns .columnContainer .mcnTextContent p{
            /*@editable*/color:#3e3c41;
            /*@editable*/font-family:Arial, serif;
            /*@editable*/font-size:16px;
            /*@editable*/line-height:130%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Columns
        @section Column Link
        @tip Set the styling for your email's column links. Choose a color that helps them stand out from your text.
        */
        #templateColumns .columnContainer .mcnTextContent a,#templateColumns .columnContainer .mcnTextContent p a{
            /*@editable*/color:#AAAAAA;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Footer
        @section Footer Style
        @tip Set the background color and borders for your email's footer area.
        */
        #templateFooter{
            /*@editable*/background-color:#fff;
            /*@editable*/background-image:none;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
            /*@editable*/padding-top:9px;
            /*@editable*/padding-bottom:30px;
        }
        /*
        @tab Footer
        @section Footer Text
        @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
        */
        #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
            /*@editable*/color:#656565;
            /*@editable*/font-family:Arial, serif;
            /*@editable*/font-size:12px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Footer
        @section Footer Link
        @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
        */
        #templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
            /*@editable*/color:#656565;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }

        @media only screen and (min-width:768px){
            .templateContainer{
                width:100% !important;
                margin: auto;
                max-width:800px !important;
            }

        }

        @media only screen and (max-width: 669px){
            .mcnTextContent {
                padding-left: 27px !important;
            }

            .mcnTextContent-padding {
                padding-top: 25px !important;
                padding-bottom: 35px !important;
            }

        }

        @media only screen and (max-width: 520px){
            .mcnTextContent {
                padding-left: 20px !important;
            }

        }

        @media only screen and (max-width: 460px){
            .mcnTextContent {
                padding-left: 16px !important;
            }


        }	@media only screen and (max-width: 480px){
            body,table,td,p,a,li,blockquote,h2{
                -webkit-text-size-adjust:none !important;
            }

        }	@media only screen and (max-width: 480px){
            body{
                width:100% !important;
                min-width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            #bodyCell{
                padding-top:10px !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnImage{
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
                max-width:100% !important;
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnBoxedTextContentContainer{
                min-width:100% !important;
            }

        }
        @media only screen and (max-width: 480px){
            .logo-mobile {
                max-width: 220px !important;
            }
        }

    </style></head>
<?php $this->beginBody() ?>
<body>
<center>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" id="bodyTable" style="height:100%;">
        <tr>
            <td align="center" valign="top" id="bodyCell">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="800" style="width:800px;">
                    <tr>
                        <td align="center" valign="top" width="800" style="width:800px;">
                <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                    <tr>
                        <td valign="top" id="templateHeader" >
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                                <tbody class="mcnImageBlockOuter">
                                <tr>
                                    <td valign="top" style="padding:0px;     border: none;" class="mcnImageBlockInner">
                                        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" id="templateBody">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                                <tbody class="mcnTextBlockOuter">
                                <tr>
                                    <td valign="top" class="mcnTextBlockInner">
                                        <!--[if mso]>
                                        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                                            <tr>
                                        <![endif]-->
                                        <!--[if mso]>
                                        <td valign="top" width="800" style="width:800px;">
                                        <![endif]-->
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%" class="mcnTextContentContainer">
                                            <tbody>
                                            <tr>
                                                <td valign="top" class="mcnTextContent mcnTextContent-padding " style="padding:67px 37px 80px;color:#3e3c41;font-size:20px;font-weight:400; line-height:100%; font-family:Arial, serif;">
                                                    <?= $content ?>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                        <!--[if mso]>
                                        </tr>
                                        </table>
                                        <![endif]-->
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" id="templateBody">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                                <tbody class="mcnTextBlockOuter">
                                <tr>
                                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                        <!--[if mso]>
                                        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                                            <tr>
                                        <![endif]-->
                                        <!--[if mso]>
                                        <td valign="top" width="800" style="width:800px;">
                                        <![endif]-->
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;" width="100%" class="mcnTextContentContainer">
                                            <tbody>
                                            <tr>
                                                <td valign="top" class="mcnTextContent" style="padding:0px 37px 25px;">
                                                    <a href="http://www.grantthornton.am/" target="_blank">
                                                        <img class="logo-mobile" style="max-width: 100%;" src="https://gallery.mailchimp.com/af7c553c367b64dbbc54ef2f0/images/b5442bcf-856a-4a28-b79d-729cd1b6bcfc.png">
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                        <!--[if mso]>
                                        </tr>
                                        </table>
                                        <![endif]-->
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
