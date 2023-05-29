-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2023 a las 15:46:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `engine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `short_descript` varchar(200) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `shw_email` varchar(100) DEFAULT NULL,
  `username` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `address` text NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `shw_password` varchar(255) NOT NULL,
  `phone_contact` varchar(55) DEFAULT NULL,
  `logo` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `terms_title` varchar(100) NOT NULL,
  `terms_descript` varchar(150) NOT NULL,
  `terms` text NOT NULL,
  `about_title` varchar(150) NOT NULL,
  `about_descript` varchar(150) NOT NULL,
  `about` text NOT NULL,
  `privacy_title` varchar(100) NOT NULL,
  `privacy_descript` varchar(150) NOT NULL,
  `privacy` text NOT NULL,
  `fb` varchar(2500) DEFAULT NULL,
  `insta` varchar(2500) DEFAULT NULL,
  `twitter` varchar(2500) DEFAULT NULL,
  `youtube` varchar(2500) DEFAULT NULL,
  `_token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `name`, `short_descript`, `email`, `shw_email`, `username`, `address`, `lat`, `lng`, `phone`, `password`, `shw_password`, `phone_contact`, `logo`, `terms_title`, `terms_descript`, `terms`, `about_title`, `about_descript`, `about`, `privacy_title`, `privacy_descript`, `privacy`, `fb`, `insta`, `twitter`, `youtube`, `_token`, `created_at`, `updated_at`) VALUES
(1, 'Engine', 'Organización 100% mexicana, sin fines de lucro, especializada en apoyar jóvenes emprendedores en todo América Latina.', 'admin@engine.com', 'contacto@engineclub.org', 'admin', 'Latitud, Avenida Lázaro Cárdenas, Valle Oriente, San Pedro Garza García, Nuevo Leon, Mexico', '25.647534', '-100.3259995', '+5216361229546', '$2y$10$7yiBbLxaEHcWMmfNIJDXNOXXeIMxF///.kuRoXEFBQDFs1PAevg9.', 'Admin15978', '+528120007805', '20221213064322.png', 'Términos y Condiciones', 'Bienvenido(a) a nuestro sistema de ventas Engine Web', '<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto;\"><strong><span lang=\"EN-US\" style=\"font-size: 20.0pt; font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><em><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Last updated:</span></em><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\"> 8-03-2023.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> respects your right to privacy.&nbsp; This Privacy Notice explains who we are, how we collect, share and use personal information about you, and how you can exercise your privacy rights.&nbsp; This Privacy Notice only applies to personal information that we collect through our website at https://engineclub.org/&nbsp;(&ldquo;<strong>Website</strong>&rdquo;).&nbsp; For details on personal information that is collected when you visit other </span><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> Network websites, please see the privacy notice referenced on these individual sites.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If you have any questions or concerns about our use of your personal information, then please contact us using the contact details provided at the bottom of this Privacy Notice.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">What does </span></strong><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> do?</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> is an organization that offer high-touch programming, spaces, storytelling, and broad innovation engagement. </span><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> offers programs coupled with localized programming and support to serve the unique needs of our community. </span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">What personal information does </span></strong><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> collect and why?</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">The personal information that we may collect about you broadly falls into the following categories:</span></p>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l3 level1 lfo1; tab-stops: list 36.0pt;\"><em><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">Information that you provide voluntarily</span></em></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Certain parts of our Website may ask you to provide personal information voluntarily: for example, we may ask you to provide your contact details in order to subscribe to receive updates and the latest news about </span><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">, hear about opportunities within the innovation community, submit enquiries to us, or become a volunteer (ambassador).&nbsp; The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">In addition should you choose to comment on our blogs or discussion boards, please note that the content of that comment and the name under which you posted that comment will be available to view by members of the public who visit our website. We therefore recommend that you do not post anything which you do not wish to be made publicly available.&nbsp;</span></p>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l6 level1 lfo2; tab-stops: list 36.0pt;\"><em><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">Information that we collect automatically</span></em></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">When you visit our Website, we may collect certain information automatically from your device.&nbsp; In some countries, including countries in the European Economic Area, this information may be considered personal information under applicable data protection laws.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Specifically, the information we collect automatically may include information like your IP address, device type, unique device identification numbers, browser-type, broad geographic location (e.g. country or city-level location) and other technical information.&nbsp; We may also collect information about how your device has interacted with our Website, including the pages accessed and links clicked.&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Collecting this information enables us to better understand the visitors who come to our Website, where they come from, and what content on our Website is of interest to them.&nbsp; We use this information for our internal analytics purposes and to improve the quality and relevance of our Website to our visitors.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Some of this information may be collected using cookies and similar tracking technology, as explained further under the heading &ldquo;Cookies and similar tracking technology&rdquo; below.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Who does </span></strong><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> share my personal information with?</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We may disclose your personal information to the following categories of recipients:</span></p>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l7 level1 lfo3; tab-stops: list 36.0pt;\"><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; mso-ansi-language: EN-US;\">T</span><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">o our<strong>&nbsp;third party services providers and partners</strong>&nbsp;who provide data processing services to us (for example, to support the delivery of, provide functionality on, or help to enhance the security of our Website), or who otherwise process personal information for purposes that are described in this Privacy Notice or notified to you when we collect your personal information. </span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l7 level1 lfo3; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">to any&nbsp;<strong>competent law enforcement body, regulatory, government agency, court or other third party</strong>&nbsp;where we believe disclosure is necessary (i) as a matter of applicable law or regulation, (ii) to exercise, establish or defend our legal rights, or (iii) to protect your vital interests or those of any other person;</span></li>\r\n</ul>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l4 level1 lfo4; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">to any&nbsp;<strong>other person with your consent</strong> to the disclosure.</span></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Legal basis for processing personal information (EEA visitors only)</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If you are a visitor from the European Economic Area, our legal basis for collecting and using the personal information described above will depend on the personal information concerned and the specific context in which we collect it.&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">However, we will normally collect personal information from you only (i) where we need the personal information to perform a contract with you, (ii) where the processing is in our legitimate interests and not overridden by your rights, or (iii) where we have your consent to do so.&nbsp; In some cases, we may also have a legal obligation to collect personal information from you.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If we ask you to provide personal information to comply with a legal requirement or to perform a contract with you, we will make this clear at the relevant time and advise you whether the provision of your personal information is mandatory or not (as well as of the possible consequences if you do not provide your personal information).&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If we collect and use your personal information in reliance on our legitimate interests (or those of any third party), this interest will normally be to operate our website and communicating with you as necessary to provide our services to you and for our legitimate commercial interest, for instance, when responding to your queries, improving our website, undertaking marketing, or for the purposes of detecting or preventing illegal activities.&nbsp; We may have other legitimate interests and if appropriate&nbsp;we will make clear to you at the relevant time what those legitimate interests are.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If you have questions about or need further information concerning the legal basis on which we collect and use your personal information, please contact us using the contact details provided under the &ldquo;How to contact us&rdquo; heading below.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Cookies and similar tracking technology&nbsp;</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We use cookies and similar tracking technology (collectively, &ldquo;<strong>Cookies</strong>&rdquo;) to collect and use personal information about you, including to serve interest-based advertising.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">How does </span></strong><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> keep my personal information secure?</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We use appropriate technical and organisational measures to protect the personal information that we collect and process about you.&nbsp; The measures we use are designed to provide a level of security appropriate to the risk of processing your personal information.&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">International data transfers</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Your personal information may be transferred to, and processed in, countries other than the country in which you are resident.&nbsp; These countries may have data protection laws that are different to the laws of your country (and, in some cases, may not be as protective).</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">However, we have taken appropriate safeguards to require that your personal information will remain protected in accordance with this Privacy Notice. These include, where appropriate, implementing the European Commission&rsquo;s Standard Contractual Clauses for transfers of personal information between </span><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE and third parties.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Our Standard Contractual Clauses can be provided on request. We have implemented similar appropriate safeguards with our third party service providers and partners and further details can be provided upon request.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">&nbsp;<strong>Data retention</strong></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We retain personal information we collect from you where we have an ongoing legitimate business need to do so (for example, to provide you with a service you have requested or to comply with applicable legal, tax or accounting requirements).&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">When we have no ongoing legitimate business need to process your personal information, we will either delete or anonymise it or, if this is not possible (for example, because your personal information has been stored in backup archives), then we will securely store your personal information and isolate it from any further processing until deletion is possible.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Your data protection rights</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">You have the following data protection rights:</span></p>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">If you wish to&nbsp;<strong>access, correct, update or request deletion</strong>&nbsp;of your personal information, you can do so at any time by contacting us using the contact details provided under the &ldquo;How to contact us&rdquo; heading below.&nbsp;&nbsp;</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">In addition, if you are a resident of the European Union, you can&nbsp;<strong>object to processing</strong>&nbsp;of your personal information, ask us to&nbsp;<strong>restrict processing</strong>&nbsp;of your personal information or&nbsp;<strong>request portability</strong>&nbsp;of your personal information. Again, you can exercise these rights by contacting us using the contact details provided under the &ldquo;How to contact us&rdquo; heading below.</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">You have the right to&nbsp;<strong>opt-out of marketing communications</strong>&nbsp;we send you at any time.&nbsp; You can exercise this right by clicking on the &ldquo;unsubscribe&rdquo; or &ldquo;opt-out&rdquo; link in the marketing e-mails we send you.&nbsp; To opt-out of other forms of marketing (such as postal marketing or telemarketing), then please contact us using the contact details provided under the &ldquo;How to contact us&rdquo; heading below.</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">Similarly, if we have collected and processed your personal information with your consent, then you can&nbsp;<strong>withdraw your consent</strong>&nbsp;at any time.&nbsp; Withdrawing your consent will not affect the lawfulness of any processing we conducted prior to your withdrawal, nor will it affect processing of your personal information conducted in reliance on lawful processing grounds other than consent.</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">You have the&nbsp;<strong>right to complain to a data protection authority</strong> about our collection and use of your personal information.&nbsp; For more information, please contact your local data protection authority.&nbsp;</span></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We respond to all requests we receive from individuals wishing to exercise their data protection rights in accordance with applicable data protection laws.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Updates to this Privacy Notice</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We may update this Privacy Notice from time to time in response to changing legal, technical or business developments. When we update our Privacy Notice, we will take appropriate measures to inform you, consistent with the significance of the changes we make.&nbsp; We will obtain your consent to any material Privacy Notice changes if and where this is required by applicable data protection laws.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">You can see when this Privacy Notice was last updated by checking the &ldquo;last updated&rdquo; date displayed at the top of this Privacy Notice.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">How to contact us</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If you have any questions or concerns about our use of your personal information, please contact us using the following details: diego@balboaelizondo.com</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto;\"><span style=\"font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\">&nbsp;</p>\r\n<p style=\"margin: 0cm;\"><strong><span style=\"font-family: Montserrat; color: black;\">COOKIE POLICY</span></strong></p>\r\n<p><strong><em><span style=\"font-family: Montserrat; color: black;\">Last updated: </span></em></strong><strong><em><span lang=\"EN-US\" style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\">8-03-2023</span></em></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">This Cookie Notice explains how </span><span lang=\"EN-US\" style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\">ENGINE</span><span style=\"font-family: Montserrat; color: black;\"> (&ldquo;<strong>we</strong>&ldquo;, &ldquo;<strong>us</strong>&ldquo;, and &ldquo;<strong>ours</strong>&ldquo;) use cookies and similar technologies to recognize you when you visit our website</span><span style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\"> <span lang=\"EN-US\">at </span></span><a href=\"../\"><span style=\"font-family: Montserrat;\">https://engineclub.org</span></a><span style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\"> </span><span style=\"font-family: Montserrat; color: black;\">(&ldquo;<strong>Website</strong>&ldquo;).&nbsp; It explains what these technologies are and why we use them, as well as your rights to control our use of them.</span></p>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">What are cookies?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">Cookies are small data files that are placed on your computer or mobile device when you visit a website.&nbsp; Cookies are widely used by website owners in order to make their websites work, or to work more efficiently, as well as to provide reporting information.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">Cookies set by the website owner (in this case, </span><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; color: black;\">) are called &ldquo;first party cookies&rdquo;.&nbsp; Cookies set by parties other than the website owner are called &ldquo;third party cookies&rdquo;. Third party cookies enable third party features or functionality to be provided on or through the website (e.g. like advertising, interactive content and analytics).&nbsp; The parties that set these third party cookies can recognize your computer both when it visits the website in question and also when it visits certain other websites.</span></p>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">Why do we use cookies?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">We use first party and third party cookies for several reasons. Some cookies are required for technical reasons in order for our Websites to operate, and we refer to these as &ldquo;essential&rdquo; or &ldquo;strictly necessary&rdquo; cookies. Other cookies also enable us to track and target the interests of our users to enhance the experience on our Websites.&nbsp; Third parties serve cookies through our Websites for advertising, analytics and other purposes. This is described in more detail below.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">The specific types of first and third party cookies served through our Websites and the purposes they perform are described below (please note that the specific cookies served may vary depending on the specific Website you visit):</span></p>\r\n<ul style=\"margin-top: 0cm;\" type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l2 level1 lfo6; tab-stops: list 36.0pt;\"><strong><span style=\"font-family: Montserrat;\">Essential website cookies:</span></strong><span style=\"font-family: Montserrat; mso-ansi-language: EN-US;\"> </span><span style=\"font-family: Montserrat;\">These cookies are strictly necessary to provide you with services available through our Websites and to use some of its features, such as access to secure areas.</span></li>\r\n<ul style=\"margin-top: 0cm;\" type=\"circle\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l2 level2 lfo6; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">Who serves these cookies</span></strong><span style=\"font-family: Montserrat;\">: </span><span lang=\"EN-US\" style=\"font-family: Montserrat; background: yellow; mso-highlight: yellow; mso-ansi-language: EN-US;\">ENGINE</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l2 level2 lfo6; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">How to refuse</span></strong><span style=\"font-family: Montserrat;\">: Because these cookies are strictly necessary to deliver the Websites to you, you cannot refuse them. You can block or delete them by changing your browser settings however, as described below under the heading &ldquo;How can I control cookies?&rdquo;</span></li>\r\n</ul>\r\n</ul>\r\n<ul style=\"margin-top: 0cm;\" type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l0 level1 lfo7; tab-stops: list 36.0pt;\"><strong><span style=\"font-family: Montserrat;\">Analytics and&nbsp;customization&nbsp;cookies:</span></strong><span style=\"font-family: Montserrat;\">&nbsp;These cookies collect information that is used either in aggregate form to help us understand how our Websites are being used or how effective marketing campaigns are, or to help us customize our Websites for you.</span></li>\r\n<ul style=\"margin-top: 0cm;\" type=\"circle\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l0 level2 lfo7; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">Who serves these cookies</span></strong><span style=\"font-family: Montserrat;\">: <span style=\"background: yellow; mso-highlight: yellow;\">Google Analytics</span></span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l0 level2 lfo7; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">How to refuse</span></strong><span style=\"font-family: Montserrat;\">: To refuse these cookies, please follow the instructions below under the heading &ldquo;How can I control cookies? Alternatively, please click on&nbsp;</span><span style=\"color: windowtext;\"><a href=\"https://tools.google.com/dlpage/gaoptout/\" target=\"_blank\" rel=\"noopener\"><span style=\"font-family: Montserrat;\">this link</span></a></span><span style=\"font-family: Montserrat;\">&nbsp;to learn how to opt-out of this cookie.</span></li>\r\n</ul>\r\n</ul>\r\n<ul style=\"margin-top: 0cm;\" type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l5 level1 lfo8; tab-stops: list 36.0pt;\"><strong><span style=\"font-family: Montserrat;\">Social networking cookies:</span></strong><span style=\"font-family: Montserrat;\">&nbsp;These cookies are used to enable you to share pages and content that you find interesting on our Websites through third party social networking and other websites.&nbsp; These cookies may also be used for advertising purposes too.</span></li>\r\n<ul style=\"margin-top: 0cm;\" type=\"circle\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l5 level2 lfo8; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">Who serves these cookies</span></strong><span style=\"font-family: Montserrat;\">: <span style=\"background: yellow; mso-highlight: yellow;\">Gravatar</span></span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l5 level2 lfo8; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">How to refuse</span></strong><span style=\"font-family: Montserrat;\">: To refuse these cookies, please follow the instructions below under the heading &ldquo;How can I control cookies?&rdquo; Alternatively, please click on&nbsp;</span><span style=\"color: windowtext;\"><a href=\"https://automattic.com/cookies/\" target=\"_blank\" rel=\"noopener\"><span style=\"font-family: Montserrat;\">this link</span></a></span><span style=\"font-family: Montserrat;\">&nbsp;to learn how to opt-out of this cookie.</span></li>\r\n</ul>\r\n</ul>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">How can I control cookies?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">You have the right to decide whether to accept or reject cookies.&nbsp; You can exercise your cookie preferences by clicking on the appropriate opt-out links provided in the cookie table above.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">You can set or amend your web browser controls to accept or refuse cookies. If you choose to reject cookies, you may still use our website though your access to some functionality and areas of our website may be restricted. &nbsp; As the means by which you can refuse cookies through your web browser controls vary from browser-to-browser, you should visit your browser&rsquo;s help menu for more information.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">In addition, most advertising networks offer you a way to opt out of targeted advertising. If you would like to find out more information, please visit&nbsp;</span><a href=\"http://www.aboutads.info/choices/\" target=\"_blank\" rel=\"noopener\"><span style=\"font-family: Montserrat;\">http://www.aboutads.info/choices/</span></a><span style=\"font-family: Montserrat; color: black;\">&nbsp;or&nbsp;</span><a href=\"http://www.youronlinechoices.com/\" target=\"_blank\" rel=\"noopener\"><span style=\"font-family: Montserrat;\">http://www.youronlinechoices.com</span></a><span style=\"font-family: Montserrat; color: black;\">.</span></p>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">How often will you update this Cookie Notice?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">We may update this Cookie Notice from time to time in order to reflect, for example, changes to the cookies we use or for other operational, legal or regulatory reasons. Please therefore re-visit this Cookie Notice regularly to stay informed about our use of cookies and related technologies.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">The date at the top of this Cookie Notice indicates when it was last updated.</span></p>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">Where can I get further information?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">If you have any questions about our use of cookies or other technologies, please email us at </span><span lang=\"EN-US\" style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\">diego@balboaelizondo.com</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\">&nbsp;</p>', 'Acerca de nosotros', 'Conoce acerca de nustra empresa', '<h3 class=\"ec-cms-block-title\">Welcome to Engine Web.</h3>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum is simply dutmmy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <strong>Lorem Ipsum is simply dutmmy text</strong></p>\r\n<h3 class=\"ec-cms-block-title\">Engine&nbsp;Websites</h3>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum is simply dutmmy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <strong>Lorem Ipsum is simply dutmmy text</strong></p>\r\n<h3 class=\"ec-cms-block-title\">How browsing and vendor works?</h3>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum is simply dutmmy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <strong>Lorem Ipsum is simply dutmmy text</strong></p>\r\n<h3 class=\"ec-cms-block-title\">Becoming an vendor</h3>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum is simply dutmmy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <strong>Lorem Ipsum is simply dutmmy text</strong></p>', 'Política de privacidad', 'Bienvenido(a) a nuestro sistema de ventas Engine Web', '<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto;\"><strong><span lang=\"EN-US\" style=\"font-size: 20.0pt; font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><em><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Last updated:</span></em><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\"> 8-03-2023.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> respects your right to privacy.&nbsp; This Privacy Notice explains who we are, how we collect, share and use personal information about you, and how you can exercise your privacy rights.&nbsp; This Privacy Notice only applies to personal information that we collect through our website at https://engineclub.org/&nbsp;(&ldquo;<strong>Website</strong>&rdquo;).&nbsp; For details on personal information that is collected when you visit other </span><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> Network websites, please see the privacy notice referenced on these individual sites.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If you have any questions or concerns about our use of your personal information, then please contact us using the contact details provided at the bottom of this Privacy Notice.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">What does </span></strong><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> do?</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> is an organization that offer high-touch programming, spaces, storytelling, and broad innovation engagement. </span><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> offers programs coupled with localized programming and support to serve the unique needs of our community. </span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">What personal information does </span></strong><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> collect and why?</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">The personal information that we may collect about you broadly falls into the following categories:</span></p>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l3 level1 lfo1; tab-stops: list 36.0pt;\"><em><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">Information that you provide voluntarily</span></em></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Certain parts of our Website may ask you to provide personal information voluntarily: for example, we may ask you to provide your contact details in order to subscribe to receive updates and the latest news about </span><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">, hear about opportunities within the innovation community, submit enquiries to us, or become a volunteer (ambassador).&nbsp; The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">In addition should you choose to comment on our blogs or discussion boards, please note that the content of that comment and the name under which you posted that comment will be available to view by members of the public who visit our website. We therefore recommend that you do not post anything which you do not wish to be made publicly available.&nbsp;</span></p>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l6 level1 lfo2; tab-stops: list 36.0pt;\"><em><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">Information that we collect automatically</span></em></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">When you visit our Website, we may collect certain information automatically from your device.&nbsp; In some countries, including countries in the European Economic Area, this information may be considered personal information under applicable data protection laws.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Specifically, the information we collect automatically may include information like your IP address, device type, unique device identification numbers, browser-type, broad geographic location (e.g. country or city-level location) and other technical information.&nbsp; We may also collect information about how your device has interacted with our Website, including the pages accessed and links clicked.&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Collecting this information enables us to better understand the visitors who come to our Website, where they come from, and what content on our Website is of interest to them.&nbsp; We use this information for our internal analytics purposes and to improve the quality and relevance of our Website to our visitors.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Some of this information may be collected using cookies and similar tracking technology, as explained further under the heading &ldquo;Cookies and similar tracking technology&rdquo; below.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Who does </span></strong><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> share my personal information with?</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We may disclose your personal information to the following categories of recipients:</span></p>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l7 level1 lfo3; tab-stops: list 36.0pt;\"><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; mso-ansi-language: EN-US;\">T</span><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">o our<strong>&nbsp;third party services providers and partners</strong>&nbsp;who provide data processing services to us (for example, to support the delivery of, provide functionality on, or help to enhance the security of our Website), or who otherwise process personal information for purposes that are described in this Privacy Notice or notified to you when we collect your personal information. </span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l7 level1 lfo3; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">to any&nbsp;<strong>competent law enforcement body, regulatory, government agency, court or other third party</strong>&nbsp;where we believe disclosure is necessary (i) as a matter of applicable law or regulation, (ii) to exercise, establish or defend our legal rights, or (iii) to protect your vital interests or those of any other person;</span></li>\r\n</ul>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l4 level1 lfo4; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">to any&nbsp;<strong>other person with your consent</strong> to the disclosure.</span></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Legal basis for processing personal information (EEA visitors only)</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If you are a visitor from the European Economic Area, our legal basis for collecting and using the personal information described above will depend on the personal information concerned and the specific context in which we collect it.&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">However, we will normally collect personal information from you only (i) where we need the personal information to perform a contract with you, (ii) where the processing is in our legitimate interests and not overridden by your rights, or (iii) where we have your consent to do so.&nbsp; In some cases, we may also have a legal obligation to collect personal information from you.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If we ask you to provide personal information to comply with a legal requirement or to perform a contract with you, we will make this clear at the relevant time and advise you whether the provision of your personal information is mandatory or not (as well as of the possible consequences if you do not provide your personal information).&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If we collect and use your personal information in reliance on our legitimate interests (or those of any third party), this interest will normally be to operate our website and communicating with you as necessary to provide our services to you and for our legitimate commercial interest, for instance, when responding to your queries, improving our website, undertaking marketing, or for the purposes of detecting or preventing illegal activities.&nbsp; We may have other legitimate interests and if appropriate&nbsp;we will make clear to you at the relevant time what those legitimate interests are.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If you have questions about or need further information concerning the legal basis on which we collect and use your personal information, please contact us using the contact details provided under the &ldquo;How to contact us&rdquo; heading below.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Cookies and similar tracking technology&nbsp;</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We use cookies and similar tracking technology (collectively, &ldquo;<strong>Cookies</strong>&rdquo;) to collect and use personal information about you, including to serve interest-based advertising.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">How does </span></strong><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\"> keep my personal information secure?</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We use appropriate technical and organisational measures to protect the personal information that we collect and process about you.&nbsp; The measures we use are designed to provide a level of security appropriate to the risk of processing your personal information.&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">International data transfers</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Your personal information may be transferred to, and processed in, countries other than the country in which you are resident.&nbsp; These countries may have data protection laws that are different to the laws of your country (and, in some cases, may not be as protective).</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">However, we have taken appropriate safeguards to require that your personal information will remain protected in accordance with this Privacy Notice. These include, where appropriate, implementing the European Commission&rsquo;s Standard Contractual Clauses for transfers of personal information between </span><span lang=\"EN-US\" style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black; mso-ansi-language: EN-US;\">ENGINE and third parties.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Our Standard Contractual Clauses can be provided on request. We have implemented similar appropriate safeguards with our third party service providers and partners and further details can be provided upon request.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">&nbsp;<strong>Data retention</strong></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We retain personal information we collect from you where we have an ongoing legitimate business need to do so (for example, to provide you with a service you have requested or to comply with applicable legal, tax or accounting requirements).&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">When we have no ongoing legitimate business need to process your personal information, we will either delete or anonymise it or, if this is not possible (for example, because your personal information has been stored in backup archives), then we will securely store your personal information and isolate it from any further processing until deletion is possible.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Your data protection rights</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">You have the following data protection rights:</span></p>\r\n<ul type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">If you wish to&nbsp;<strong>access, correct, update or request deletion</strong>&nbsp;of your personal information, you can do so at any time by contacting us using the contact details provided under the &ldquo;How to contact us&rdquo; heading below.&nbsp;&nbsp;</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">In addition, if you are a resident of the European Union, you can&nbsp;<strong>object to processing</strong>&nbsp;of your personal information, ask us to&nbsp;<strong>restrict processing</strong>&nbsp;of your personal information or&nbsp;<strong>request portability</strong>&nbsp;of your personal information. Again, you can exercise these rights by contacting us using the contact details provided under the &ldquo;How to contact us&rdquo; heading below.</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">You have the right to&nbsp;<strong>opt-out of marketing communications</strong>&nbsp;we send you at any time.&nbsp; You can exercise this right by clicking on the &ldquo;unsubscribe&rdquo; or &ldquo;opt-out&rdquo; link in the marketing e-mails we send you.&nbsp; To opt-out of other forms of marketing (such as postal marketing or telemarketing), then please contact us using the contact details provided under the &ldquo;How to contact us&rdquo; heading below.</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">Similarly, if we have collected and processed your personal information with your consent, then you can&nbsp;<strong>withdraw your consent</strong>&nbsp;at any time.&nbsp; Withdrawing your consent will not affect the lawfulness of any processing we conducted prior to your withdrawal, nor will it affect processing of your personal information conducted in reliance on lawful processing grounds other than consent.</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify; mso-list: l1 level1 lfo5; tab-stops: list 36.0pt;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\';\">You have the&nbsp;<strong>right to complain to a data protection authority</strong> about our collection and use of your personal information.&nbsp; For more information, please contact your local data protection authority.&nbsp;</span></li>\r\n</ul>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We respond to all requests we receive from individuals wishing to exercise their data protection rights in accordance with applicable data protection laws.</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">Updates to this Privacy Notice</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">We may update this Privacy Notice from time to time in response to changing legal, technical or business developments. When we update our Privacy Notice, we will take appropriate measures to inform you, consistent with the significance of the changes we make.&nbsp; We will obtain your consent to any material Privacy Notice changes if and where this is required by applicable data protection laws.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">You can see when this Privacy Notice was last updated by checking the &ldquo;last updated&rdquo; date displayed at the top of this Privacy Notice.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><strong><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">How to contact us</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\"><span style=\"font-family: Montserrat; mso-fareast-font-family: \'Times New Roman\'; mso-bidi-font-family: \'Times New Roman\'; color: black;\">If you have any questions or concerns about our use of your personal information, please contact us using the following details: diego@balboaelizondo.com</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto;\"><span style=\"font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\">&nbsp;</p>\r\n<p style=\"margin: 0cm;\"><strong><span style=\"font-family: Montserrat; color: black;\">COOKIE POLICY</span></strong></p>\r\n<p><strong><em><span style=\"font-family: Montserrat; color: black;\">Last updated: </span></em></strong><strong><em><span lang=\"EN-US\" style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\">8-03-2023</span></em></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">This Cookie Notice explains how </span><span lang=\"EN-US\" style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\">ENGINE</span><span style=\"font-family: Montserrat; color: black;\"> (&ldquo;<strong>we</strong>&ldquo;, &ldquo;<strong>us</strong>&ldquo;, and &ldquo;<strong>ours</strong>&ldquo;) use cookies and similar technologies to recognize you when you visit our website</span><span style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\"> <span lang=\"EN-US\">at </span></span><a href=\"../\"><span style=\"font-family: Montserrat;\">https://engineclub.org</span></a><span style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\"> </span><span style=\"font-family: Montserrat; color: black;\">(&ldquo;<strong>Website</strong>&ldquo;).&nbsp; It explains what these technologies are and why we use them, as well as your rights to control our use of them.</span></p>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">What are cookies?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">Cookies are small data files that are placed on your computer or mobile device when you visit a website.&nbsp; Cookies are widely used by website owners in order to make their websites work, or to work more efficiently, as well as to provide reporting information.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">Cookies set by the website owner (in this case, </span><strong><span lang=\"EN-US\" style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\">ENGINE</span></strong><span style=\"font-family: Montserrat; color: black;\">) are called &ldquo;first party cookies&rdquo;.&nbsp; Cookies set by parties other than the website owner are called &ldquo;third party cookies&rdquo;. Third party cookies enable third party features or functionality to be provided on or through the website (e.g. like advertising, interactive content and analytics).&nbsp; The parties that set these third party cookies can recognize your computer both when it visits the website in question and also when it visits certain other websites.</span></p>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">Why do we use cookies?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">We use first party and third party cookies for several reasons. Some cookies are required for technical reasons in order for our Websites to operate, and we refer to these as &ldquo;essential&rdquo; or &ldquo;strictly necessary&rdquo; cookies. Other cookies also enable us to track and target the interests of our users to enhance the experience on our Websites.&nbsp; Third parties serve cookies through our Websites for advertising, analytics and other purposes. This is described in more detail below.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">The specific types of first and third party cookies served through our Websites and the purposes they perform are described below (please note that the specific cookies served may vary depending on the specific Website you visit):</span></p>\r\n<ul style=\"margin-top: 0cm;\" type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l2 level1 lfo6; tab-stops: list 36.0pt;\"><strong><span style=\"font-family: Montserrat;\">Essential website cookies:</span></strong><span style=\"font-family: Montserrat; mso-ansi-language: EN-US;\"> </span><span style=\"font-family: Montserrat;\">These cookies are strictly necessary to provide you with services available through our Websites and to use some of its features, such as access to secure areas.</span></li>\r\n<ul style=\"margin-top: 0cm;\" type=\"circle\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l2 level2 lfo6; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">Who serves these cookies</span></strong><span style=\"font-family: Montserrat;\">: </span><span lang=\"EN-US\" style=\"font-family: Montserrat; background: yellow; mso-highlight: yellow; mso-ansi-language: EN-US;\">ENGINE</span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l2 level2 lfo6; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">How to refuse</span></strong><span style=\"font-family: Montserrat;\">: Because these cookies are strictly necessary to deliver the Websites to you, you cannot refuse them. You can block or delete them by changing your browser settings however, as described below under the heading &ldquo;How can I control cookies?&rdquo;</span></li>\r\n</ul>\r\n</ul>\r\n<ul style=\"margin-top: 0cm;\" type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l0 level1 lfo7; tab-stops: list 36.0pt;\"><strong><span style=\"font-family: Montserrat;\">Analytics and&nbsp;customization&nbsp;cookies:</span></strong><span style=\"font-family: Montserrat;\">&nbsp;These cookies collect information that is used either in aggregate form to help us understand how our Websites are being used or how effective marketing campaigns are, or to help us customize our Websites for you.</span></li>\r\n<ul style=\"margin-top: 0cm;\" type=\"circle\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l0 level2 lfo7; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">Who serves these cookies</span></strong><span style=\"font-family: Montserrat;\">: <span style=\"background: yellow; mso-highlight: yellow;\">Google Analytics</span></span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l0 level2 lfo7; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">How to refuse</span></strong><span style=\"font-family: Montserrat;\">: To refuse these cookies, please follow the instructions below under the heading &ldquo;How can I control cookies? Alternatively, please click on&nbsp;</span><span style=\"color: windowtext;\"><a href=\"https://tools.google.com/dlpage/gaoptout/\" target=\"_blank\" rel=\"noopener\"><span style=\"font-family: Montserrat;\">this link</span></a></span><span style=\"font-family: Montserrat;\">&nbsp;to learn how to opt-out of this cookie.</span></li>\r\n</ul>\r\n</ul>\r\n<ul style=\"margin-top: 0cm;\" type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l5 level1 lfo8; tab-stops: list 36.0pt;\"><strong><span style=\"font-family: Montserrat;\">Social networking cookies:</span></strong><span style=\"font-family: Montserrat;\">&nbsp;These cookies are used to enable you to share pages and content that you find interesting on our Websites through third party social networking and other websites.&nbsp; These cookies may also be used for advertising purposes too.</span></li>\r\n<ul style=\"margin-top: 0cm;\" type=\"circle\">\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l5 level2 lfo8; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">Who serves these cookies</span></strong><span style=\"font-family: Montserrat;\">: <span style=\"background: yellow; mso-highlight: yellow;\">Gravatar</span></span></li>\r\n<li class=\"MsoNormal\" style=\"color: black; mso-list: l5 level2 lfo8; tab-stops: list 72.0pt;\"><strong><span style=\"font-family: Montserrat;\">How to refuse</span></strong><span style=\"font-family: Montserrat;\">: To refuse these cookies, please follow the instructions below under the heading &ldquo;How can I control cookies?&rdquo; Alternatively, please click on&nbsp;</span><span style=\"color: windowtext;\"><a href=\"https://automattic.com/cookies/\" target=\"_blank\" rel=\"noopener\"><span style=\"font-family: Montserrat;\">this link</span></a></span><span style=\"font-family: Montserrat;\">&nbsp;to learn how to opt-out of this cookie.</span></li>\r\n</ul>\r\n</ul>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">How can I control cookies?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">You have the right to decide whether to accept or reject cookies.&nbsp; You can exercise your cookie preferences by clicking on the appropriate opt-out links provided in the cookie table above.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">You can set or amend your web browser controls to accept or refuse cookies. If you choose to reject cookies, you may still use our website though your access to some functionality and areas of our website may be restricted. &nbsp; As the means by which you can refuse cookies through your web browser controls vary from browser-to-browser, you should visit your browser&rsquo;s help menu for more information.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">In addition, most advertising networks offer you a way to opt out of targeted advertising. If you would like to find out more information, please visit&nbsp;</span><a href=\"http://www.aboutads.info/choices/\" target=\"_blank\" rel=\"noopener\"><span style=\"font-family: Montserrat;\">http://www.aboutads.info/choices/</span></a><span style=\"font-family: Montserrat; color: black;\">&nbsp;or&nbsp;</span><a href=\"http://www.youronlinechoices.com/\" target=\"_blank\" rel=\"noopener\"><span style=\"font-family: Montserrat;\">http://www.youronlinechoices.com</span></a><span style=\"font-family: Montserrat; color: black;\">.</span></p>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">How often will you update this Cookie Notice?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">We may update this Cookie Notice from time to time in order to reflect, for example, changes to the cookies we use or for other operational, legal or regulatory reasons. Please therefore re-visit this Cookie Notice regularly to stay informed about our use of cookies and related technologies.</span></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">The date at the top of this Cookie Notice indicates when it was last updated.</span></p>\r\n<p><strong><span style=\"font-family: Montserrat; color: black;\">Where can I get further information?</span></strong></p>\r\n<p><span style=\"font-family: Montserrat; color: black;\">If you have any questions about our use of cookies or other technologies, please email us at </span><span lang=\"EN-US\" style=\"font-family: Montserrat; color: black; mso-ansi-language: EN-US;\">diego@balboaelizondo.com</span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; text-align: justify;\">&nbsp;</p>', 'https://www.facebook.com/engine.mx', 'https://www.instagram.com/engine.mx/', 'https://www.twitter.com/engine.mx/', 'https://www.youtube.com/engine.mx/', 'qzrRntctq9Ha0NLcqt0O6fj3LUg1OGZEvMPGUQSR', '2019-03-27 14:47:27', '2023-03-15 18:35:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `descript` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `title`, `subtitle`, `descript`, `status`, `position`, `created_at`, `updated_at`) VALUES
(17, '1670922779289.png', 'demo', 'demo', 'banner de demo', 0, 0, '2022-12-13 15:12:59', '2022-12-13 15:12:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_no` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientsinfo`
--

CREATE TABLE `clientsinfo` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `descript` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientsinfo`
--

INSERT INTO `clientsinfo` (`id`, `title`, `descript`, `updated_at`, `created_at`) VALUES
(1, 'JUNTOS SOMOS', 'Nuestras Alianzas Estratégicas', '2023-05-18 21:42:31', '2022-12-16 01:14:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_events`
--

CREATE TABLE `comments_events` (
  `id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `comments_events`
--

INSERT INTO `comments_events` (`id`, `events_id`, `user_id`, `comment`, `rating`, `status`, `updated_at`, `created_at`) VALUES
(2, 3, 10, 'esta excelente el evento, felcidades', 4, 0, '2022-12-17 03:13:22', '2022-12-17 03:04:31'),
(3, 3, 13, 'no me lo puedo creer que excelente', 3, 0, '2022-12-17 03:13:25', '2022-12-17 03:09:28'),
(5, 3, 10, 'excelente veamos que pasa...', 0, 0, '2022-12-17 10:53:26', '2022-12-17 10:53:26'),
(6, 3, 10, 'bueno todo parece indicar que si se registro', 0, 0, '2022-12-17 10:53:51', '2022-12-17 10:53:51'),
(7, 1, 13, 'ey!! excelente me enantaria poder ir', 0, 0, '2022-12-17 10:58:43', '2022-12-17 10:58:43'),
(8, 1, 13, 'muy bien muy bien', 0, 0, '2022-12-17 11:00:16', '2022-12-17 11:00:16'),
(9, 3, 13, 'ey tuuuu', 0, 0, '2022-12-17 11:01:03', '2022-12-17 11:01:03'),
(10, 2, 13, 'perfecto todo trabaja muy bien', 0, 0, '2022-12-17 11:11:58', '2022-12-17 11:11:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `img` varchar(155) NOT NULL,
  `titulo` varchar(155) NOT NULL,
  `subtitulo` varchar(155) DEFAULT NULL,
  `descript` text NOT NULL,
  `lugar` varchar(155) NOT NULL,
  `fecha` varchar(155) NOT NULL,
  `hora` varchar(155) NOT NULL,
  `confirmacion` int(11) DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 0,
  `code` varchar(100) NOT NULL,
  `cupo` varchar(155) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `img`, `titulo`, `subtitulo`, `descript`, `lugar`, `fecha`, `hora`, `confirmacion`, `level`, `code`, `cupo`, `status`, `updated_at`, `created_at`) VALUES
(1, '1674942304347.jpeg', 'Recorrido Empresarial', NULL, '<p>Te comparto la invitaci&oacute;n a el pr&oacute;ximo evento de Engine &ldquo;Recorrido Empresarial en John Deer&rdquo; presencial en Monterrey, Nuevo Le&oacute;n</p>\r\n<p><span style=\"text-decoration: underline;\"><strong>Fecha:</strong></span> *Sabado 03 de Dic *<br><span style=\"text-decoration: underline;\"><strong>Hora:</strong></span> 9:30am &nbsp;- 11:30pm&nbsp;<br><span style=\"text-decoration: underline;\"><strong>Sede:</strong></span> John Deer Saltillo</p>\r\n<p>https://maps.app.goo.gl/5ek75XeyLQ5tDtZz7?g_st=ic</p>\r\n<p>FAVOR DE CONFIRMAR PARA SEPARAR TU LUGAR!<br>Confirmaci&oacute;n: https://forms.gle/ChhRYDfr8qgqBQXA9</p>', 'John Deere Saltillo', '2022-12-03', '09:30', 0, 0, 'EVT1-ENG', NULL, 1, '2023-02-25 18:53:04', '2022-12-17 05:57:02'),
(2, '1674942067330.jpeg', 'FEMSA Ventures - Javier García', 'FEMSA Ventures - Javier García', '<p>Te comparto la invitaci&oacute;n a &ldquo;Engine&rdquo; presencial en Monterrey, Nuevo Le&oacute;n</p>\r\n<p><span style=\"text-decoration: underline;\"><strong>Fecha:</strong></span> Lunes 28 de Nov<br><span style=\"text-decoration: underline;\"><strong>Hora: </strong></span>2:00pm &nbsp;- 4:30pm&nbsp;<br><span style=\"text-decoration: underline;\"><strong>Sede:</strong></span> WeWork Torre Latitud, San Pedro Garza Garc&iacute;a</p>\r\n<p>&nbsp;https://goo.gl/maps/8tah8i5JtdobYZiMA</p>\r\n<p>&iexcl;CUPO LIMITADO A 30 PERSONAS!</p>\r\n<p>Engine es un grupo de emprendedores enfocado en tu crecimiento personal como el de tus diferentes negocios.</p>\r\n<p><strong>&nbsp;FAVOR DE CONFIRMAR PARA SEPARAR TU LUGAR!</strong><br>Confirmaci&oacute;n: https://forms.gle/gYE71zyxabnmKmUdA</p>', 'WeWork Torre Latitud', '2022-11-28', '14:00', 0, 2, 'EVT2-ENG', NULL, 1, '2023-03-01 04:45:01', '2022-12-17 06:00:38'),
(3, '1674941878370.jpeg', 'KOLONUS - Paco Macedo', NULL, '<p>Te comparto la invitaci&oacute;n a &ldquo;Engine&rdquo; presencial en Monterrey, Nuevo Le&oacute;n</p>\r\n<p><strong><span style=\"text-decoration: underline;\">Fecha:</span></strong> Sabado 19 de Nov<br><span style=\"text-decoration: underline;\"><strong>Hora:</strong></span> 3:50pm &nbsp;- 6:30pm&nbsp;<br><span style=\"text-decoration: underline;\"><strong>Sede:</strong></span> WeWork Torre Latitud, San Pedro Garza Garc&iacute;a</p>\r\n<p style=\"text-align: left;\">https://goo.gl/maps/8tah8i5JtdobYZiMA</p>\r\n<p>&nbsp;&iexcl;CUPO LIMITADO A 30 PERSONAS!</p>\r\n<p>Engine es un grupo de emprendedores enfocado en tu crecimiento personal como el de tus diferentes negocios.</p>\r\n<p><strong>FAVOR DE CONFIRMAR PARA SEPARAR TU LUGAR!&nbsp;</strong></p>', 'WeWork Torre Latitud', '2022-11-19', '16:00', 0, 0, 'EVT3-ENG', NULL, 1, '2023-02-25 18:53:13', '2022-12-17 06:03:24'),
(4, '1680719731549.jpeg', 'El arte de hablar en público', 'Zaira Rocha', '<p>prueba.</p>', 'WeWork - Torre Latitud', '2023-04-01', '03:50', 0, 0, '0000', NULL, 1, '2023-04-05 18:35:31', '2023-04-05 18:35:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events_confirms`
--

CREATE TABLE `events_confirms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `events_confirms`
--

INSERT INTO `events_confirms` (`id`, `user_id`, `events_id`, `code`, `updated_at`, `created_at`) VALUES
(2, 10, 2, 'EVT2-ENG', '2023-02-25 19:59:38', '2023-02-25 19:59:38'),
(3, 10, 3, 'free', '2023-03-01 04:45:15', '2023-03-01 04:45:15'),
(4, 10, 1, 'free', '2023-03-01 04:45:20', '2023-03-01 04:45:20'),
(5, 19, 4, 'free', '2023-04-05 18:54:13', '2023-04-05 18:54:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mentors`
--

CREATE TABLE `mentors` (
  `id` int(11) NOT NULL,
  `img` varchar(155) NOT NULL,
  `nombre` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `descript` text NOT NULL,
  `facebook` varchar(155) DEFAULT NULL,
  `twitter` varchar(155) DEFAULT NULL,
  `instagram` varchar(155) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mentors`
--

INSERT INTO `mentors` (`id`, `img`, `nombre`, `email`, `descript`, `facebook`, `twitter`, `instagram`, `status`, `updated_at`, `created_at`) VALUES
(4, '1676900549266.png', 'Diego Elizondo Garza', 'diego@balboaelizondo.com', '- Socio Fundador - Despacho Jurídico Balboa Elizondo, S.C.\r\n- Director Jurídico / Socio - Soluciones Tecnológicas Xedik, S.A. de C.V.\r\n- Socio - Dael Transportes de Calidad, S.A. de C.V.\r\n- Socio Fundador - AliviaFem, S.A. de C.V.\r\n\r\nLicenciado en Derecho.\r\n- Especialidad en Derecho Corporativo.\r\n- Especialidad en Litigio Mercantil/Civil y Amparo.\r\n- Maestría en Derecho de lo Negocios en la Facultad Libre de Derecho de Monterrey.', NULL, NULL, 'https://www.instagram.com/diegoelizondolegal/', 1, '2023-04-05 06:25:03', '2022-12-22 14:11:48'),
(5, '1674940060640.jpg', 'Jose Manuel Contreras Sanchez', 'JManuelC@engineclub.org', 'Presidente/Fundador:\r\n-Fundador de Engine.\r\n-Presidente de YPO/YNG Nacional.\r\n-Inversionista.\r\n-BrotherUpSkills.\r\n-Eminentis.', NULL, NULL, 'https://www.instagram.com/jmcontrerass11/', 1, '2023-04-05 06:24:51', '2023-01-28 21:07:40'),
(6, '1676900919190.png', 'Jose Adrian Contreras Sanchez', 'jadriancontreras88@gmail.com', 'Director/Fundador:\r\n-BrotherUpSkills.\r\n-YPO.\r\n-Chilacuates.\r\n-PuestoPasta.', NULL, NULL, 'https://www.instagram.com/cuatejacs/', 1, '2023-04-05 06:27:18', '2023-01-28 21:22:45'),
(7, '1676901421384.png', 'José Alejandro Medrano Arenas', 'alexmedranoare@gmail.com', 'Dirección General:\r\n-Materiales y Bloques Monterrey.\r\n-Construcciones Arenas.\r\n-Acabados Freya (Accionista Mayoritario).', NULL, NULL, NULL, 1, '2023-04-05 06:24:38', '2023-02-20 13:57:01'),
(8, '1676901549464.png', 'Javier Adrian Schmal Hernandez', 'javishmal0@gmail.com', '- CEO de SOLUM.\r\nExperiencia en inversiones, conocimiento y habilidades en el  mercado de los commodities, la tecnología blockchain y la gestión de carteras de inversión.', NULL, NULL, 'https://www.instagram.com/javischmalh/', 1, '2023-04-05 06:21:00', '2023-02-20 13:59:09'),
(9, '1680676298150.png', 'José Juan Salazar Padron', 'josejuansalazarpadron1@gmail.com', 'Director/Fundador:\r\n-Controles y Proyectos de Instrumentación, S.A. de C.V.\r\n-Restaurantero (Pastes de Minas/ Curandero Café y Pan y Dolce Marquesa).\r\n-Scout.\r\n\r\nExperiencia amplia en inversiones, desarrollo inmobiliario y ramo textil.', NULL, NULL, 'https://www.instagram.com/pepesalazar.01/', 1, '2023-04-05 06:31:38', '2023-04-05 06:31:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email_contact` varchar(100) NOT NULL,
  `status` int(11) DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `newsletter`
--

INSERT INTO `newsletter` (`id`, `email_contact`, `status`, `updated_at`, `created_at`) VALUES
(5, 'quezada.adrian@hotmail.com', 1, '2022-03-11 03:00:02', '2022-03-11 03:00:02'),
(6, 'negravargas07@gmail.com', 1, '2022-03-15 12:59:49', '2022-03-15 12:59:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code_order` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `d_charges` double NOT NULL,
  `t_charges` tinyint(1) NOT NULL,
  `price_comm` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `notes` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `our_clients`
--

CREATE TABLE `our_clients` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `url` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `our_clients`
--

INSERT INTO `our_clients` (`id`, `imagen`, `url`, `status`, `updated_at`, `created_at`) VALUES
(2, '1674939390277.png', NULL, 1, '2023-01-28 20:56:30', '2022-12-16 06:44:31'),
(3, '1674939426403.png', NULL, 1, '2023-01-28 20:57:06', '2022-12-16 06:44:51'),
(4, '1674939458311.png', NULL, 1, '2023-01-28 20:57:38', '2022-12-16 06:45:03'),
(5, '1674939484455.png', NULL, 1, '2023-01-28 20:58:04', '2022-12-16 06:45:37'),
(6, '1674939542222.png', NULL, 1, '2023-01-28 20:59:02', '2022-12-16 06:45:53'),
(8, '1680676703375.jpg', NULL, 1, '2023-04-05 06:38:23', '2023-04-05 06:38:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id`, `name`, `address`, `email`, `phone`, `country`, `logo`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'TECNO', 'Caracas', 'TECNO@gmail.com', '04123456789', 'MX', '1684850578349.jpg', NULL, '2023-05-23 18:02:59', '2023-05-23 18:02:59'),
(7, 'Amazon', 'EEUU California', 'AMAZON@gmail.com', '12355567854', 'Mexico', '1684868418376.jpg', NULL, '2023-05-23 23:00:18', '2023-05-23 23:00:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `cost_product` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `quotes`
--

INSERT INTO `quotes` (`id`, `product_id`, `cost_product`, `updated_at`, `created_at`) VALUES
(1, '1', '1500', '2022-10-19 04:24:44', '2022-10-19 04:24:44'),
(2, '2', '3500', '2022-10-19 04:24:44', '2022-10-19 04:24:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_services`
--

CREATE TABLE `request_services` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `request_services`
--

INSERT INTO `request_services` (`id`, `user_id`, `service_id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 22, 4, 1, 'comprar', '2023-05-24 00:15:00', '2023-05-25 07:04:22'),
(6, 10, 6, 0, 'lo compro', '2023-05-25 17:34:27', '2023-05-25 16:19:59'),
(7, 22, 5, 0, 'lo quiero', '2023-05-25 17:34:41', '2023-05-25 17:34:41'),
(8, 22, 7, 0, 'lo alquilo', '2023-05-25 17:36:36', '2023-05-25 17:36:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `descript` text NOT NULL,
  `pic` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `job_title`, `descript`, `pic`, `rating`, `status`, `updated_at`, `created_at`) VALUES
(1, 'John Doe', 'General Manager', 'asdasdasd', '1649407297265.jpg', 2, 1, '2022-04-08 14:41:37', '2022-04-08 14:36:31'),
(3, 'Sindy', 'Comunity Manager', 'Excelente web para realizar mis compras', '1649407732639.jpg', 4, 1, '2022-04-08 14:49:20', '2022-04-08 14:48:52'),
(4, 'Dania', 'Revendedora Syscom', 'Son los mejores precios y los mas asquibles', '1649407821671.jpg', 5, 1, '2022-04-08 14:50:21', '2022-04-08 14:50:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `titulo` varchar(155) NOT NULL,
  `subtitulo` varchar(155) DEFAULT NULL,
  `descript` text NOT NULL,
  `btn_text` varchar(200) DEFAULT NULL,
  `btn_action` text DEFAULT NULL,
  `video` varchar(155) DEFAULT NULL,
  `pic_1` varchar(155) DEFAULT NULL,
  `pic_2` varchar(155) DEFAULT NULL,
  `pic_3` varchar(155) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `section`, `titulo`, `subtitulo`, `descript`, `btn_text`, `btn_action`, `video`, `pic_1`, `pic_2`, `pic_3`, `updated_at`, `created_at`) VALUES
(1, 1, 'Engine es', 'emprendimiento, seguridad y confianza, apoyo al emprendedor', 'Organización 100% mexicana, sin fines de lucro, especializada en apoyar jóvenes emprendedores.', NULL, '', NULL, '1674941252650.gif', '1674941253195.gif', '1674941254166.gif', '2023-03-08 21:20:47', '2022-12-16 19:43:16'),
(2, 2, 'Quienes somos nosotros?', 'Somos un grupo de EMPRENDEDORES enfocados en nuestro crecimiento personal como el de nuestros negocios.', 'Buscamos fomentar el emprendimiento y llevar a las personas hacia el bien, dentro y fuera del emprendimiento. Mejorando la vida de las personas a través del DESARROLLO PERSONAL Y ECONOMICO.', NULL, '', 'interview.mp4', NULL, NULL, NULL, '2023-01-28 20:36:37', '2022-12-16 19:58:59'),
(3, 3, 'Conecta con nuestros asesores', NULL, '¿Tienes alguna duda? ¡No te preocupes! Permite que nuestros asesores y asesoras respondan todas tus preguntas.', NULL, NULL, NULL, '1671242998362.jpg', 'g9.jpg', '1671242998381.jpg', '2022-12-17 08:09:58', '2022-12-16 20:19:45'),
(4, 4, '¡Conoce nuestro Equipo!', 'NUESTRO EQUIPO', 'Conoce a alguno de nuestros miembros!', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-20 13:31:01', '2023-01-14 01:55:08'),
(5, 5, 'ASISTE A TU PRIMERA SESIÓN', '¿QUE ESPERAS? Ven nuestra próxima sesión para conocernos!', 'Toma la oportunidad!', 'Obtener información', 'https://calendly.com/engineclub', NULL, NULL, NULL, NULL, '2023-04-05 06:33:31', '2023-01-14 02:56:47'),
(6, 6, '¿Que nos hace tan diferentes?', 'Nuestros Beneficios', '[{\"value\":\"Networking\"},{\"value\":\"GYM\"},{\"value\":\"Oficinas\"},{\"value\":\"Cursos\"},{\"value\":\"Mentores\"},{\"value\":\"Conferencias\"},{\"value\":\"Psicólogo\"},{\"value\":\"Becas\"},{\"value\":\"Espacio seguro para emprendedores\"},{\"value\":\"Orientador Vocacional\"},{\"value\":\"Recorridos empresariales\"},{\"value\":\"Y MAS!\"}]', NULL, NULL, NULL, '1676899718306.jpeg', NULL, NULL, '2023-03-08 21:21:40', '2023-02-15 21:20:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services_providers`
--

CREATE TABLE `services_providers` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `services_providers`
--

INSERT INTO `services_providers` (`id`, `type`, `title`, `description`, `logo`, `provider_id`, `created_at`, `updated_at`) VALUES
(4, 'product', 'Bluestack', 'APP mobile', '1684868029678.png', 6, '2023-05-23 22:53:49', '2023-05-23 22:53:49'),
(5, 'employe', 'Predator', 'Rastrador', '1685018955621.jpg', 7, '2023-05-25 16:49:15', '2023-05-25 16:49:15'),
(6, 'product', 'Black Adam', 'Pelicula', '1685019068503.jpg', 7, '2023-05-25 16:51:08', '2023-05-25 16:51:08'),
(7, 'service', 'Caballo', 'Montar', '1685019119601.jpg', 7, '2023-05-25 16:51:59', '2023-05-25 16:51:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `ApiKey_google` varchar(250) NOT NULL,
  `stripe_api_id` varchar(250) NOT NULL,
  `stripe_client_id` varchar(250) NOT NULL,
  `comm_stripe` double NOT NULL,
  `id_openpay` varchar(150) NOT NULL,
  `private_key_openpay` varchar(150) NOT NULL,
  `public_key_openpay` varchar(150) NOT NULL,
  `paypal_client_id` varchar(150) NOT NULL,
  `paypal_secret` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `admin`, `ApiKey_google`, `stripe_api_id`, `stripe_client_id`, `comm_stripe`, `id_openpay`, `private_key_openpay`, `public_key_openpay`, `paypal_client_id`, `paypal_secret`, `updated_at`, `created_at`) VALUES
(1, 1, 'AIzaSyDLntfJ-XQkLKX9txSmnTR_YXtyE6_wyo4', 'pk_test_a9MEuU6Nf2n46K6UHJnkeyNM00bsiJg1Ns', 'sk_test_uH7yGehKBAqvS7CrRZWViSjX004xy3jhSz', 3.6, 'ml4hevfgwhdblzunse3m', 'sk_0b5e165105d64b64a16b9e18f4af8dc9', 'pk_b4cda4894a1f46b0901884d07b27f43f', 'AfL8BvDacas6RlW9pdrpN5X0PNENAtNuGGOqLejBzwk0VkyE0NkA9WKe22umNGGdNK_JIt_rkfL9ekoo', 'EIOU03-Ib7ysgPFruRJDN2RDgkDrX6uO15U_Zx8N5OTXGRm0-TRUH2PGjoycLXafsvXLvKWJBjvZqEkC', '2022-10-19 10:37:53', '2022-04-06 07:17:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `name` varchar(120) NOT NULL,
  `last_name` varchar(120) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `pic_profile` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `phone_verify` int(11) NOT NULL DEFAULT 1,
  `company` varchar(200) DEFAULT NULL,
  `job` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `shw_password` varchar(120) NOT NULL,
  `status` int(11) DEFAULT 0,
  `level` int(11) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `last_name`, `about`, `pic_profile`, `email`, `phone`, `phone_verify`, `company`, `job`, `country`, `address`, `twitter`, `facebook`, `instagram`, `linkedin`, `password`, `shw_password`, `status`, `level`, `updated_at`, `created_at`) VALUES
(10, 1, 'Adrian', 'Quezada figueroa', 'Ingeniero en sistemas computacionales, Desarrollador Full Stack de aplicaciones Web/Móviles con amplia experiencia en integración a nuevas tecnologías, creador de sistemas innovadores distribuidos en gran parte de México, Estados Unidos, Chile, Colombia, Venezuela y Perú, Con gran respeto y amor por la tecnología, me dedico a crear experiencias nuevas intentando realizar sueños partiendo de ideas.', '20221210050548.jpg', 'quezada.adrian@hotmail.com', '6361229546', 1, 'DesarrollosQV', 'Ing. en sistemas', 'Mexico', 'calle fernando montes de oca #2908', 'https://twitter.com/eidrian.qf', 'https://facebook.com/desarrollosqv', 'https://instagram.com/eidrian.qf', 'https://www.linkedin.com/in/ing-adri%C3%A1n-quezada-aa2498104/', '$2y$10$h8Z0Q8bDpEJblr23GBNxFOwr9TL4CVFtjrW2WJIzlKdBEN0hC5Po2', 'Admin15978', 0, 1, '2023-05-26 01:14:06', '2022-03-15 13:38:08'),
(13, 1, 'jose alfredo', NULL, 'soy nuevo', '20221213090823.jpg', 'soporte.desarrollosqv@gmail.com', '6361032399', 1, 'nuevo', 'jefe', 'chile', 'chile', 'https://twitter.com/', 'https://facebook.com/', 'https://instagram.com/', 'https://linkedin.com/', '$2y$10$WBGBmPLswmvRKVTRpTSgFed/Bu5rt2Luw1HcghFKr/T2JDoq4c1HO', 'Pendejadas234xy.', 0, 0, '2023-05-26 01:14:02', '2022-12-13 15:03:51'),
(22, 1, 'Luis', 'Alejandro', 'hola', '1684425748419.jpg', 'l@gmail.com', '04123456789', 1, 'CACompany', 'Obrero', 'Venezuela', 'Caracas', 'https://twitter.com/', 'https://facebook.com/', 'https://instagram.com/', 'https://linkedin.com/', '$2y$10$edW/yo7BiHKxhtvYZ7/OI.zZpSJwYQbQQyzWCi/105VGz4Ga9C.Gq', '123', 0, 3, '2023-05-26 01:13:58', '2023-05-18 20:02:28'),
(30, 2, 'Apple', NULL, NULL, NULL, 'apple@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$.4Zc3chIEvXhakWq2cG/Me.ku8FtG.ZlE/pjlB7UqTr.Auio3kX6K', '12345678', 0, 0, '2023-05-26 17:31:46', '2023-05-26 17:31:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `hosting` varchar(100) NOT NULL,
  `ip` varchar(155) NOT NULL,
  `visit` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientsinfo`
--
ALTER TABLE `clientsinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments_events`
--
ALTER TABLE `comments_events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events_confirms`
--
ALTER TABLE `events_confirms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `our_clients`
--
ALTER TABLE `our_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_providers_users` (`user_id`);

--
-- Indices de la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `request_services`
--
ALTER TABLE `request_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_request_services_users` (`user_id`),
  ADD KEY `FK_request_services_services_providers` (`service_id`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `services_providers`
--
ALTER TABLE `services_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Porviders_Services_FK1` (`provider_id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientsinfo`
--
ALTER TABLE `clientsinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comments_events`
--
ALTER TABLE `comments_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `events_confirms`
--
ALTER TABLE `events_confirms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `our_clients`
--
ALTER TABLE `our_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `request_services`
--
ALTER TABLE `request_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `services_providers`
--
ALTER TABLE `services_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `FK_providers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `request_services`
--
ALTER TABLE `request_services`
  ADD CONSTRAINT `FK_request_services_services_providers` FOREIGN KEY (`service_id`) REFERENCES `services_providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_request_services_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `services_providers`
--
ALTER TABLE `services_providers`
  ADD CONSTRAINT `Porviders_Services_FK1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
