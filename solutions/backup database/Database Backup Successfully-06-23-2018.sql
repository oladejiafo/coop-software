DROP TABLE IF EXISTS account type;

;



DROP TABLE IF EXISTS agents;

CREATE TABLE `agents` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Agent` varchar(50) default NULL,
  `Phone` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS analysis;

CREATE TABLE `analysis` (
  `ID` bigint(11) NOT NULL auto_increment,
  `iclass` varchar(50) default NULL,
  `idetails` varchar(100) default NULL,
  `idate` date default NULL,
  `iamount` decimal(13,2) default NULL,
  `eclass` varchar(50) default NULL,
  `edetails` varchar(100) default NULL,
  `edate` date default NULL,
  `eamount` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS asset category;

;



DROP TABLE IF EXISTS asset status;

;



DROP TABLE IF EXISTS assets;

CREATE TABLE `assets` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Code` varchar(50) default NULL,
  `Location` varchar(50) default NULL,
  `Category` varchar(50) default NULL,
  `Name` varchar(50) default NULL,
  `Description` varchar(50) default NULL,
  `Make` varchar(50) default NULL,
  `Quantity` bigint(11) default NULL,
  `Date Acquired` date default NULL,
  `Date Sold` date default NULL,
  `Purchase Price` decimal(13,2) default NULL,
  `Current Value` decimal(13,2) default NULL,
  `Status` varchar(50) default NULL,
  `Serial No` varchar(50) default NULL,
  `Next Maintenance` date default NULL,
  `Comment` varchar(200) default NULL,
  `Sold` tinyint(1) default '0',
  `Amount Sold` decimal(13,2) default NULL,
  `Depreciation` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO assets VALUES("1","mt/vh/001/ab","Abuja","Vehicle","Van","Condo Van","Toyota","1","2007-12-12","0000-00-00","3000000.00","2000000.00","Good","1245667fgghh778","0000-00-00","","0","0.00","700000.00");


DROP TABLE IF EXISTS bank;

CREATE TABLE `bank` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Bank` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO bank VALUES("2","BUBA");
INSERT INTO bank VALUES("2","Zenith");
INSERT INTO bank VALUES("3","First Bank");
INSERT INTO bank VALUES("4","Access Bank");


DROP TABLE IF EXISTS booln;

CREATE TABLE `booln` (
  `val` bigint(11) default NULL,
  `type` varchar(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO booln VALUES("0","No");
INSERT INTO booln VALUES("1","Yes");


DROP TABLE IF EXISTS branch;

CREATE TABLE `branch` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Branch` varchar(50) default NULL,
  `Branch Code` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO branch VALUES("1","Suame","013");


DROP TABLE IF EXISTS budget;

CREATE TABLE `budget` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Type` varchar(50) default NULL,
  `Month` date default NULL,
  `Class` varchar(50) default NULL,
  `Budget` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO budget VALUES("1","Expenditure","2009-01-31","Transportation","30000.00");


DROP TABLE IF EXISTS cash;

CREATE TABLE `cash` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Type` varchar(50) default NULL,
  `Date` date default NULL,
  `Classification` varchar(70) default NULL,
  `Particulars` varchar(50) default NULL,
  `Amount` decimal(13,2) default NULL,
  `Source` varchar(50) default NULL,
  `Branch` varchar(50) default NULL,
  `Recipient` varchar(50) default NULL,
  `Account` varchar(50) default NULL,
  `Bank` varchar(50) default NULL,
  `Paid` varchar(50) default NULL,
  `Remark` text,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS category;

CREATE TABLE `category` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Category` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("1","Administrative Expenses");
INSERT INTO category VALUES("3","Current Assets");
INSERT INTO category VALUES("4","Fixed Assets");
INSERT INTO category VALUES("5","Turnover");


DROP TABLE IF EXISTS cheque;

CREATE TABLE `cheque` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Type` varchar(50) default NULL,
  `Date` date default NULL,
  `Bank` varchar(50) default NULL,
  `Cheque No` varchar(50) default NULL,
  `Amount` decimal(13,2) default NULL,
  `Particulars` varchar(150) default NULL,
  `Status` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS cms_access_levels;

CREATE TABLE `cms_access_levels` (
  `access_lvl` bigint(11) NOT NULL auto_increment,
  `access_name` varchar(50) default NULL,
  `Remark` varchar(50) default NULL,
  PRIMARY KEY  (`access_lvl`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO cms_access_levels VALUES("1","Cashier","Accesses Transations Only");
INSERT INTO cms_access_levels VALUES("2","Customer Service","Accesses Customer Details, Accounts Opening and Re");
INSERT INTO cms_access_levels VALUES("4","Manager","Accesses Everything except admin center");
INSERT INTO cms_access_levels VALUES("5","Administrator","Accesses All");
INSERT INTO cms_access_levels VALUES("3","Account","Accounts, Reports and Loans");
INSERT INTO cms_access_levels VALUES("6","Loan Officer","Loans and Leases");
INSERT INTO cms_access_levels VALUES("7","Agent","Contributions");


DROP TABLE IF EXISTS command;

CREATE TABLE `command` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Command` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  PRIMARY KEY  (`ID`),
  FULLTEXT KEY `Command` (`Command`,`Location`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS company info;

;



DROP TABLE IF EXISTS contract;

CREATE TABLE `contract` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Contractor` varchar(50) default NULL,
  `Contract Date` date default NULL,
  `Contract Title` varchar(50) default NULL,
  `Contract Category` varchar(50) default NULL,
  `Paid` varchar(20) default NULL,
  `Amount` decimal(11,2) default NULL,
  `Amount Paid` decimal(11,2) default NULL,
  `Contact` varchar(50) default NULL,
  `Contract Status` varchar(25) default NULL,
  `Bank` varchar(50) default NULL,
  `Account` varchar(50) default NULL,
  `Remark` varchar(50) default NULL,
  `Contact Phone` varchar(20) default NULL,
  `Contractor Address` text,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO contract VALUES("1","ade","2009-02-09","HR Automation","ICT","Part Payme","10000000.00","3000000.00","","In Progress","","","Approved","","");
INSERT INTO contract VALUES("2","me","2014-11-11","Test","Supplies","Unpaid","45000.00","0.00","you","In Progress","","","","","");


DROP TABLE IF EXISTS contributions;

CREATE TABLE `contributions` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Account Number` varchar(50) default NULL,
  `Surname` varchar(50) default NULL,
  `First Name` varchar(50) default NULL,
  `Amount` decimal(13,2) default NULL,
  `Agent` varchar(50) default NULL,
  `Date` date default NULL,
  `Entered By` varchar(50) default NULL,
  `Pay Mode` varchar(50) default NULL,
  `Type` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS creg_fees;

CREATE TABLE `creg_fees` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Fee` varchar(50) default NULL,
  `Amount` decimal(11,2) default NULL,
  `Account No` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO creg_fees VALUES("1","Application Fees","1000.00","12345678");
INSERT INTO creg_fees VALUES("2","File Fees","200.00","12345678");
INSERT INTO creg_fees VALUES("3","Insurance Fees","1000.00","12345678");
INSERT INTO creg_fees VALUES("4","Guarantor Fees","300.00","12345678");
INSERT INTO creg_fees VALUES("5","Ref fees","1000.00","12345678");


DROP TABLE IF EXISTS currency detail;

;

INSERT INTO currency detail VALUES("1","GHc100");
INSERT INTO currency detail VALUES("2","GHc50");
INSERT INTO currency detail VALUES("3","GHc20");
INSERT INTO currency detail VALUES("4","N100");
INSERT INTO currency detail VALUES("5","GHc10");
INSERT INTO currency detail VALUES("6","GHc5");
INSERT INTO currency detail VALUES("7","GHc1");
INSERT INTO currency detail VALUES("8","50Ps");


DROP TABLE IF EXISTS currency;

CREATE TABLE `currency` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Currency` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO currency VALUES("1","GHc100");
INSERT INTO currency VALUES("2","GHc50");
INSERT INTO currency VALUES("3","GHc20");
INSERT INTO currency VALUES("4","N100");
INSERT INTO currency VALUES("5","GHc10");
INSERT INTO currency VALUES("6","GHc5");
INSERT INTO currency VALUES("7","GHc1");
INSERT INTO currency VALUES("8","50Ps");


DROP TABLE IF EXISTS customer;

CREATE TABLE `customer` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Account Type` varchar(50) default NULL,
  `Account Number` varchar(50) default NULL,
  `Surname` varchar(50) default NULL,
  `First Name` varchar(50) default NULL,
  `Gender` varchar(10) default NULL,
  `Age` varchar(5) default NULL,
  `Contact Number` varchar(20) default NULL,
  `Marital Status` varchar(20) default NULL,
  `Home Address` varchar(120) default NULL,
  `Postal Address` varchar(120) default NULL,
  `Occupation` varchar(50) default NULL,
  `Office Address` varchar(120) default NULL,
  `Next of Kin` varchar(50) default NULL,
  `Relationship` varchar(50) default NULL,
  `NKin Contact` varchar(120) default NULL,
  `Date Registered` date default NULL,
  `Identification Type` varchar(50) default NULL,
  `Identification Number` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `Employer` varchar(50) default NULL,
  `Position` varchar(50) default NULL,
  `NK Phone` varchar(35) default NULL,
  `Mobile Number` varchar(50) default NULL,
  `Account Officer` varchar(50) default NULL,
  `Status` varchar(50) default NULL,
  `Officer` varchar(50) default NULL,
  `Group` varchar(50) default NULL,
  `Branch` varchar(50) default NULL,
  `Customer Category` varchar(50) default NULL,
  `Group Name` varchar(50) default NULL,
  `Name1` varchar(50) default NULL,
  `Position1` varchar(50) default NULL,
  `Contact Number1` varchar(50) default NULL,
  `Mobile Number1` varchar(50) default NULL,
  `Office Address1` varchar(150) default NULL,
  `Home Address1` varchar(150) default NULL,
  `Marital Status1` varchar(50) default NULL,
  `Gender1` varchar(50) default NULL,
  `Age1` varchar(50) default NULL,
  `email1` varchar(50) default NULL,
  `Occupation1` varchar(50) default NULL,
  `Employer1` varchar(50) default NULL,
  `Next of Kin1` varchar(50) default NULL,
  `Relationship1` varchar(50) default NULL,
  `NKin Contact1` varchar(100) default NULL,
  `Name2` varchar(50) default NULL,
  `Position2` varchar(50) default NULL,
  `Contact Number2` varchar(50) default NULL,
  `Mobile Number2` varchar(50) default NULL,
  `Office Address2` varchar(150) default NULL,
  `Home Address2` varchar(150) default NULL,
  `Marital Status2` varchar(50) default NULL,
  `Gender2` varchar(50) default NULL,
  `Age2` varchar(50) default NULL,
  `email2` varchar(50) default NULL,
  `Occupation2` varchar(50) default NULL,
  `Employer2` varchar(50) default NULL,
  `Next of Kin2` varchar(50) default NULL,
  `Relationship2` varchar(50) default NULL,
  `NKin Contact2` varchar(100) default NULL,
  `Name3` varchar(50) default NULL,
  `Position3` varchar(50) default NULL,
  `Contact Number3` varchar(50) default NULL,
  `Mobile Number3` varchar(50) default NULL,
  `Office Address3` varchar(150) default NULL,
  `Home Address3` varchar(150) default NULL,
  `Marital Status3` varchar(50) default NULL,
  `Gender3` varchar(50) default NULL,
  `Age3` varchar(50) default NULL,
  `email3` varchar(50) default NULL,
  `Occupation3` varchar(50) default NULL,
  `Employer3` varchar(50) default NULL,
  `Next of Kin3` varchar(50) default NULL,
  `Relationship3` varchar(50) default NULL,
  `NKin Contact3` varchar(100) default NULL,
  `Closure Date` date default NULL,
  `Closure Reason` varchar(100) default NULL,
  `Sex` varchar(50) default NULL,
  `Daily Contribution` decimal(11,2) default NULL,
  `Date of Birth` date default NULL,
  `Value at maturity` decimal(11,2) default NULL,
  `Value of Premium` decimal(11,2) default NULL,
  `Duration` varchar(20) default NULL,
  `Due Date` date default NULL,
  `SMS` tinyint(1) default '1',
  `email alert` tinyint(1) default '1',
  `BVN` varchar(20) default NULL,
  `Registration Date` date default NULL,
  `Contribution Charge` decimal(11,2) default NULL,
  `Passbook Charge` decimal(11,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO customer VALUES("1","Current","100","tester","Oladetest","Male","","","","","","","","","","","2018-04-24","Drivers Licence","1123","","","","","","me","Active","","Individual","Suame","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","2018-04-24","","","","","0","0","","","","");


DROP TABLE IF EXISTS equip type;

;



DROP TABLE IF EXISTS fees;

CREATE TABLE `fees` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Type` varchar(50) default NULL,
  `Rate` decimal(11,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO fees VALUES("1","Tithe","10.00");
INSERT INTO fees VALUES("2","VAT","5.00");
INSERT INTO fees VALUES("3","Tax","10.00");


DROP TABLE IF EXISTS group;

;



DROP TABLE IF EXISTS heads category;

;

INSERT INTO heads category VALUES("1","Interest Income on Loans to Clients","101","","Interest Income on Loans and Advances");
INSERT INTO heads category VALUES("2","Interest Income on Loans to Non-Clients","102","Interest Income on Loans to Non-MFI Clients ","Interest Income on Loans and Advances");
INSERT INTO heads category VALUES("3","Interest Income from Balances","111","","Interest Income other than on Loans and Advances");
INSERT INTO heads category VALUES("4","Interest Income from Accounts with Banks and other","112","","Interest Income other than on Loans and Advances");
INSERT INTO heads category VALUES("5","Interest Income from Approved Investments","113","","Interest Income other than on Loans and Advances");
INSERT INTO heads category VALUES("6","Other Interest Income","119","","Interest Income other than on Loans and Advances");
INSERT INTO heads category VALUES("7","Client Fees Paid","121","","Fees and Charges");
INSERT INTO heads category VALUES("8","Client Penalties","122","","Fees and Charges");
INSERT INTO heads category VALUES("9","Fee from Payment services and Intra-country Transfers","123","","Fees and Charges");
INSERT INTO heads category VALUES("10","Fee from Offering Insurance Products as Agent","124","","Fees and Charges");
INSERT INTO heads category VALUES("11","Other Operating Income","129","","Fees and Charges");
INSERT INTO heads category VALUES("12","Interest Income Expense on Clients Deposits","201","","Interest Income Expense");
INSERT INTO heads category VALUES("13","Interest Income Expense on Clients Voluntary Savings","202","","Interest Income Expense");
INSERT INTO heads category VALUES("14","Interest Income Expense on Deposits of Non-Clients","203","","Interest Income Expense");
INSERT INTO heads category VALUES("15","Interest Income Expense on Deposits of Non-Clients","204","","Interest Income Expense");
INSERT INTO heads category VALUES("16","Interest Income Expense on Short-term Loans","205","","Interest Income Expense");
INSERT INTO heads category VALUES("17","Interest Income Expense on Long-term Loans","206","","Interest Income Expense");
INSERT INTO heads category VALUES("18","Interest Income Expense on other Borrowings","209","","Interest Income Expense");
INSERT INTO heads category VALUES("19","Fees Paid for Loans form Banks and other Organization","211","","Non-Interest Expenses");
INSERT INTO heads category VALUES("20","Commissions Paid for Loans from Banks and other Organizations","212","","Non-Interest Expenses");
INSERT INTO heads category VALUES("21","Specific Reserve Expense","221","","Loan and Interest Loss reserves");
INSERT INTO heads category VALUES("22","General Reserve Expense","222","","Loan and Interest Loss reserves");
INSERT INTO heads category VALUES("23","Provision for Loss on Investments and Loans to other Organizations","223","","Loan and Interest Loss reserves");
INSERT INTO heads category VALUES("24","Provision for Loss on Assets Acquired in Liquidation","224","","Loan and Interest Loss reserves");
INSERT INTO heads category VALUES("25","Employee Personnel Expenses","231","","General and Administrative Expenses");
INSERT INTO heads category VALUES("26","Office Expenses","232","","General and Administrative Expenses");
INSERT INTO heads category VALUES("27","Professional Expenses","233","","General and Administrative Expenses");
INSERT INTO heads category VALUES("28","Occupancy Expenses - Rent","234-1","","General and Administrative Expenses");
INSERT INTO heads category VALUES("29","Occupancy Expenses - Utilities/Electricity","234-2","","General and Administrative Expenses");
INSERT INTO heads category VALUES("30","Occupancy Expenses - Others","234-3","","General and Administrative Expenses");
INSERT INTO heads category VALUES("32","Employee Travel Expenses","235","","General and Administrative Expenses");
INSERT INTO heads category VALUES("33","Depreciation and Amortisation","236","","General and Administrative Expenses");
INSERT INTO heads category VALUES("34","Governance Expense","237","","General and Administrative Expenses");
INSERT INTO heads category VALUES("35","Loan Collection Expenses","241","","Loan Servicing Expenses");
INSERT INTO heads category VALUES("36","Lien Recording","242","","Loan Servicing Expenses");
INSERT INTO heads category VALUES("37","Credit history Investigation","243","","Loan Servicing Expenses");
INSERT INTO heads category VALUES("38","Other Loan Servicing Expenses","249","","Loan Servicing Expenses");
INSERT INTO heads category VALUES("39","Supervision Fee","261","","Supervision and Licensing Fees");
INSERT INTO heads category VALUES("40","Licensing Fee","262","","Supervision and Licensing Fees");
INSERT INTO heads category VALUES("41","Advertising Expenses","251","","Promotional Expenses");
INSERT INTO heads category VALUES("42","Publicity and Promotion","252","","Promotional Expenses");
INSERT INTO heads category VALUES("43","Published Materials","253","","Promotional Expenses");
INSERT INTO heads category VALUES("44","Other Promotional Expenses","259","","Promotional Expenses");
INSERT INTO heads category VALUES("45","Business License and other Local Taxes","271","","Taxes and Licenses");
INSERT INTO heads category VALUES("46","Property Tax","272","","Taxes and Licenses");
INSERT INTO heads category VALUES("47","Municipal/LGA Tax","273","","Taxes and Licenses");
INSERT INTO heads category VALUES("48","Capital Tax","274","","Taxes and Licenses");
INSERT INTO heads category VALUES("49","Registration Duty, Stamp Duty and their Equivalent","275","","Taxes and Licenses");
INSERT INTO heads category VALUES("50","Income Tax","276","","Taxes and Licenses");
INSERT INTO heads category VALUES("51","Other Indirect and Miscellaneous Taxes","279","","Taxes and Licenses");
INSERT INTO heads category VALUES("52","Cashier Shortage","281","","Cashier Shortage and Overage");
INSERT INTO heads category VALUES("53","Cashier Overage","282","","Cashier Shortage and Overage");
INSERT INTO heads category VALUES("54","Profit Tax","291","","Tax on Profit or Loss");
INSERT INTO heads category VALUES("55","Minimum Tax","292","","Tax on Profit or Loss");
INSERT INTO heads category VALUES("56","Gain on Foreign Exchange","321","","Other Income Accounts");
INSERT INTO heads category VALUES("57","Gain on Disposal of Property and Equipment","322","","Other Income Accounts");
INSERT INTO heads category VALUES("58","Gain on Sale of Investments","323","","Other Income Accounts");
INSERT INTO heads category VALUES("59","Rental Income","324","","Other Income Accounts");
INSERT INTO heads category VALUES("60","Reversal of Provisions for Liabilities and Charges","325","","Other Income Accounts");
INSERT INTO heads category VALUES("61","Write-back of Principal Received on Loans Previously Written Off","326","","Other Income Accounts");
INSERT INTO heads category VALUES("62","Write-back of Interest Received on Loans Previously Written Off","327","","Other Income Accounts");
INSERT INTO heads category VALUES("63","Other Income Items","329","","Other Income Accounts");
INSERT INTO heads category VALUES("64","Loss on Foreign Exchange","341","","Other Charges");
INSERT INTO heads category VALUES("65","Loss on Sale of Property and Equipment","342","","Other Charges");
INSERT INTO heads category VALUES("66","Loss on Sale or Disposal of Investments","343","","Other Charges");
INSERT INTO heads category VALUES("67","Provision for Major Repairs and Maintenance","344","","Other Charges");
INSERT INTO heads category VALUES("68","Provision for Off-balance Sheet Commitments","345","","Other Charges");
INSERT INTO heads category VALUES("69","Provision for Claims/Litigation","346","","Other Charges");
INSERT INTO heads category VALUES("70","Other Charges","347","","Other Charges");
INSERT INTO heads category VALUES("71","Consumer Loans to Clients","441-1","","Loans and Advances");
INSERT INTO heads category VALUES("72","Business Loans to Clients","441-2","","Loans and Advances");
INSERT INTO heads category VALUES("73","Agricultural Loans to Clients","441-3","","Loans and Advances");
INSERT INTO heads category VALUES("74","Real Estate Loans to Clients","441-4","","Loans and Advances");
INSERT INTO heads category VALUES("75","Savings and Deposit Secured Loans to Clients","441-5","","Loans and Advances");
INSERT INTO heads category VALUES("76","Other Short-term Clients Loans","441-6","","Loans and Advances");
INSERT INTO heads category VALUES("77","Current and Outstanding Loans to Non-Clients","442","","Loans and Advances");
INSERT INTO heads category VALUES("78","Restructured Loans to Clients","443","","Loans and Advances");
INSERT INTO heads category VALUES("79","Restructured Loans to Non-Clients","444","","Loans and Advances");
INSERT INTO heads category VALUES("80","Past Due Non-Performing Loans (NPL) Account","445","","Loans and Advances");
INSERT INTO heads category VALUES("81","Specific Reserve for Performing Loans (0 day) ","451","","Reserves for Possible Losses");
INSERT INTO heads category VALUES("82","Specific Reserve for Pass and Watch Loans (1-30 days)","451-1","","Reserves for Possible Losses");
INSERT INTO heads category VALUES("83","Specific Reserve for Substandard Loans (31-60 days)","451-2","","Reserves for Possible Losses");
INSERT INTO heads category VALUES("84","Specific Reserve for Doubtful Loans (61-90 days)","451-3","","Reserves for Possible Losses");
INSERT INTO heads category VALUES("85","Specific Reserve for Lost Loans (>91 days)","451-4","","Reserves for Possible Losses");
INSERT INTO heads category VALUES("86","General Reserves","452","","Reserves for Possible Losses");
INSERT INTO heads category VALUES("87","Land and Buildings","471","","Property and Equipment");
INSERT INTO heads category VALUES("88","Office Equipment","472","","Property and Equipment");
INSERT INTO heads category VALUES("89","Plant and Machinery","473","","Property and Equipment");
INSERT INTO heads category VALUES("90","Vehicles","474","","Property and Equipment");
INSERT INTO heads category VALUES("91","Furniture and Fixture","475","","Property and Equipment");
INSERT INTO heads category VALUES("92","Computer and other Equipment","476","","Property and Equipment");
INSERT INTO heads category VALUES("93","Intangible Assets","477","","Property and Equipment");
INSERT INTO heads category VALUES("94","Other Fixed Assets","478","","Property and Equipment");
INSERT INTO heads category VALUES("95","Accumulated Amortisation and Depreciation","479","","Property and Equipment");
INSERT INTO heads category VALUES("96","Prepayments","481","","Prepayments and Other Receivables");
INSERT INTO heads category VALUES("97","Short-term Receivables","482","","Prepayments and Other Receivables");
INSERT INTO heads category VALUES("98","Customers Deposits","501","","Customers Deposits");
INSERT INTO heads category VALUES("99","Term Deposits","502","","Customers Deposits");
INSERT INTO heads category VALUES("100","Interest Payable on Savings Deposits","531","","Interest Payable");
INSERT INTO heads category VALUES("101","Interest Payable on Term Deposits","532","","Interest Payable");
INSERT INTO heads category VALUES("102","Interest Payable on Short-term Bank Loans","533","","Interest Payable");
INSERT INTO heads category VALUES("103","Interest Payable on Long-term Bank Loans","534","","Interest Payable");
INSERT INTO heads category VALUES("104","Interest Payable on Other Borrowings","535","","Interest Payable");
INSERT INTO heads category VALUES("105","Accounts Payable","541","","Accounts Payable");
INSERT INTO heads category VALUES("106","Income Tax","561","","Taxes Payable");
INSERT INTO heads category VALUES("107","Withholding Tax","562","","Taxes Payable");
INSERT INTO heads category VALUES("108","Social security Tax","563","","Taxes Payable");
INSERT INTO heads category VALUES("109","Profit Tax","564","","Taxes Payable");
INSERT INTO heads category VALUES("110","Minimum Tax","565","","Taxes Payable");
INSERT INTO heads category VALUES("111","Other Taxes","569","","Taxes Payable");
INSERT INTO heads category VALUES("112","Deferred Grant Revenue","571","","Deferred Revenue");
INSERT INTO heads category VALUES("113","Deferred Revenue due to Donated Fixed Assets","572","","Deferred Revenue");
INSERT INTO heads category VALUES("114","Other Deferred Revenue Items","573","","Deferred Revenue");
INSERT INTO heads category VALUES("115","Suspense Items (unidentified)","581","","Suspense and/or Clearing Accounts");
INSERT INTO heads category VALUES("116","Clearing Account","582","","Suspense and/or Clearing Accounts");
INSERT INTO heads category VALUES("117","Other Liabilities","591","","Other Liability Accounts");
INSERT INTO heads category VALUES("118","Capital","601","","Capital");
INSERT INTO heads category VALUES("119","Retained Earnings","621","","Retained Earnings/ (Deficit)");
INSERT INTO heads category VALUES("120","Net Income (Loss) for the Current Year ","651","","Net Income (Loss)");
INSERT INTO heads category VALUES("121","Dividends Declared","661","","Dividends Declared");
INSERT INTO heads category VALUES("122","Investment in CBN Approved Government Securities","431","","Investments");
INSERT INTO heads category VALUES("123","Loans to other MFBs","432","","Investments");
INSERT INTO heads category VALUES("124","Other Investments","434","","Investments");
INSERT INTO heads category VALUES("125","Current Accounts","421","","Accounts with Banks and other Financial Institutions");
INSERT INTO heads category VALUES("126","Savings Accounts","422","","Accounts with Banks and other Financial Institutions");
INSERT INTO heads category VALUES("127","Other Accounts with Banks","423","","Accounts with Banks and other Financial Institutions");
INSERT INTO heads category VALUES("128","Cash on Hand","401","","Cash, Cheques and Other Cash Items");
INSERT INTO heads category VALUES("129","Petty Cash","402","","Cash, Cheques and Other Cash Items");
INSERT INTO heads category VALUES("130","Vault Cash","403","","Cash, Cheques and Other Cash Items");
INSERT INTO heads category VALUES("131","Cheques in Transit","404","","Cash, Cheques and Other Cash Items");
INSERT INTO heads category VALUES("132","Other Cash Accounts","405","","Cash, Cheques and Other Cash Items");


DROP TABLE IF EXISTS heads;

CREATE TABLE `heads` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Description` varchar(100) default NULL,
  `Code` varchar(50) default NULL,
  `Remarks` varchar(150) default NULL,
  `Category` varchar(60) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

INSERT INTO heads VALUES("1","Interest Income on Loans to Clients","101","","Interest Income on Loans and Advances");
INSERT INTO heads VALUES("2","Interest Income on Loans to Non-Clients","102","Interest Income on Loans to Non-MFI Clients ","Interest Income on Loans and Advances");
INSERT INTO heads VALUES("3","Interest Income from Balances","111","","Interest Income other than on Loans and Advances");
INSERT INTO heads VALUES("4","Interest Income from Accounts with Banks and other","112","","Interest Income other than on Loans and Advances");
INSERT INTO heads VALUES("5","Interest Income from Approved Investments","113","","Interest Income other than on Loans and Advances");
INSERT INTO heads VALUES("6","Other Interest Income","119","","Interest Income other than on Loans and Advances");
INSERT INTO heads VALUES("7","Client Fees Paid","121","","Fees and Charges");
INSERT INTO heads VALUES("8","Client Penalties","122","","Fees and Charges");
INSERT INTO heads VALUES("9","Fee from Payment services and Intra-country Transfers","123","","Fees and Charges");
INSERT INTO heads VALUES("10","Fee from Offering Insurance Products as Agent","124","","Fees and Charges");
INSERT INTO heads VALUES("11","Other Operating Income","129","","Fees and Charges");
INSERT INTO heads VALUES("12","Interest Income Expense on Clients Deposits","201","","Interest Income Expense");
INSERT INTO heads VALUES("13","Interest Income Expense on Clients Voluntary Savings","202","","Interest Income Expense");
INSERT INTO heads VALUES("14","Interest Income Expense on Deposits of Non-Clients","203","","Interest Income Expense");
INSERT INTO heads VALUES("15","Interest Income Expense on Deposits of Non-Clients","204","","Interest Income Expense");
INSERT INTO heads VALUES("16","Interest Income Expense on Short-term Loans","205","","Interest Income Expense");
INSERT INTO heads VALUES("17","Interest Income Expense on Long-term Loans","206","","Interest Income Expense");
INSERT INTO heads VALUES("18","Interest Income Expense on other Borrowings","209","","Interest Income Expense");
INSERT INTO heads VALUES("19","Fees Paid for Loans form Banks and other Organization","211","","Non-Interest Expenses");
INSERT INTO heads VALUES("20","Commissions Paid for Loans from Banks and other Organizations","212","","Non-Interest Expenses");
INSERT INTO heads VALUES("21","Specific Reserve Expense","221","","Loan and Interest Loss reserves");
INSERT INTO heads VALUES("22","General Reserve Expense","222","","Loan and Interest Loss reserves");
INSERT INTO heads VALUES("23","Provision for Loss on Investments and Loans to other Organizations","223","","Loan and Interest Loss reserves");
INSERT INTO heads VALUES("24","Provision for Loss on Assets Acquired in Liquidation","224","","Loan and Interest Loss reserves");
INSERT INTO heads VALUES("25","Employee Personnel Expenses","231","","General and Administrative Expenses");
INSERT INTO heads VALUES("26","Office Expenses","232","","General and Administrative Expenses");
INSERT INTO heads VALUES("27","Professional Expenses","233","","General and Administrative Expenses");
INSERT INTO heads VALUES("28","Occupancy Expenses - Rent","234-1","","General and Administrative Expenses");
INSERT INTO heads VALUES("29","Occupancy Expenses - Utilities/Electricity","234-2","","General and Administrative Expenses");
INSERT INTO heads VALUES("30","Occupancy Expenses - Others","234-3","","General and Administrative Expenses");
INSERT INTO heads VALUES("32","Employee Travel Expenses","235","","General and Administrative Expenses");
INSERT INTO heads VALUES("33","Depreciation and Amortisation","236","","General and Administrative Expenses");
INSERT INTO heads VALUES("34","Governance Expense","237","","General and Administrative Expenses");
INSERT INTO heads VALUES("35","Loan Collection Expenses","241","","Loan Servicing Expenses");
INSERT INTO heads VALUES("36","Lien Recording","242","","Loan Servicing Expenses");
INSERT INTO heads VALUES("37","Credit history Investigation","243","","Loan Servicing Expenses");
INSERT INTO heads VALUES("38","Other Loan Servicing Expenses","249","","Loan Servicing Expenses");
INSERT INTO heads VALUES("39","Supervision Fee","261","","Supervision and Licensing Fees");
INSERT INTO heads VALUES("40","Licensing Fee","262","","Supervision and Licensing Fees");
INSERT INTO heads VALUES("41","Advertising Expenses","251","","Promotional Expenses");
INSERT INTO heads VALUES("42","Publicity and Promotion","252","","Promotional Expenses");
INSERT INTO heads VALUES("43","Published Materials","253","","Promotional Expenses");
INSERT INTO heads VALUES("44","Other Promotional Expenses","259","","Promotional Expenses");
INSERT INTO heads VALUES("45","Business License and other Local Taxes","271","","Taxes and Licenses");
INSERT INTO heads VALUES("46","Property Tax","272","","Taxes and Licenses");
INSERT INTO heads VALUES("47","Municipal/LGA Tax","273","","Taxes and Licenses");
INSERT INTO heads VALUES("48","Capital Tax","274","","Taxes and Licenses");
INSERT INTO heads VALUES("49","Registration Duty, Stamp Duty and their Equivalent","275","","Taxes and Licenses");
INSERT INTO heads VALUES("50","Income Tax","276","","Taxes and Licenses");
INSERT INTO heads VALUES("51","Other Indirect and Miscellaneous Taxes","279","","Taxes and Licenses");
INSERT INTO heads VALUES("52","Cashier Shortage","281","","Cashier Shortage and Overage");
INSERT INTO heads VALUES("53","Cashier Overage","282","","Cashier Shortage and Overage");
INSERT INTO heads VALUES("54","Profit Tax","291","","Tax on Profit or Loss");
INSERT INTO heads VALUES("55","Minimum Tax","292","","Tax on Profit or Loss");
INSERT INTO heads VALUES("56","Gain on Foreign Exchange","321","","Other Income Accounts");
INSERT INTO heads VALUES("57","Gain on Disposal of Property and Equipment","322","","Other Income Accounts");
INSERT INTO heads VALUES("58","Gain on Sale of Investments","323","","Other Income Accounts");
INSERT INTO heads VALUES("59","Rental Income","324","","Other Income Accounts");
INSERT INTO heads VALUES("60","Reversal of Provisions for Liabilities and Charges","325","","Other Income Accounts");
INSERT INTO heads VALUES("61","Write-back of Principal Received on Loans Previously Written Off","326","","Other Income Accounts");
INSERT INTO heads VALUES("62","Write-back of Interest Received on Loans Previously Written Off","327","","Other Income Accounts");
INSERT INTO heads VALUES("63","Other Income Items","329","","Other Income Accounts");
INSERT INTO heads VALUES("64","Loss on Foreign Exchange","341","","Other Charges");
INSERT INTO heads VALUES("65","Loss on Sale of Property and Equipment","342","","Other Charges");
INSERT INTO heads VALUES("66","Loss on Sale or Disposal of Investments","343","","Other Charges");
INSERT INTO heads VALUES("67","Provision for Major Repairs and Maintenance","344","","Other Charges");
INSERT INTO heads VALUES("68","Provision for Off-balance Sheet Commitments","345","","Other Charges");
INSERT INTO heads VALUES("69","Provision for Claims/Litigation","346","","Other Charges");
INSERT INTO heads VALUES("70","Other Charges","347","","Other Charges");
INSERT INTO heads VALUES("71","Consumer Loans to Clients","441-1","","Loans and Advances");
INSERT INTO heads VALUES("72","Business Loans to Clients","441-2","","Loans and Advances");
INSERT INTO heads VALUES("73","Agricultural Loans to Clients","441-3","","Loans and Advances");
INSERT INTO heads VALUES("74","Real Estate Loans to Clients","441-4","","Loans and Advances");
INSERT INTO heads VALUES("75","Savings and Deposit Secured Loans to Clients","441-5","","Loans and Advances");
INSERT INTO heads VALUES("76","Other Short-term Clients Loans","441-6","","Loans and Advances");
INSERT INTO heads VALUES("77","Current and Outstanding Loans to Non-Clients","442","","Loans and Advances");
INSERT INTO heads VALUES("78","Restructured Loans to Clients","443","","Loans and Advances");
INSERT INTO heads VALUES("79","Restructured Loans to Non-Clients","444","","Loans and Advances");
INSERT INTO heads VALUES("80","Past Due Non-Performing Loans (NPL) Account","445","","Loans and Advances");
INSERT INTO heads VALUES("81","Specific Reserve for Performing Loans (0 day) ","451","","Reserves for Possible Losses");
INSERT INTO heads VALUES("82","Specific Reserve for Pass and Watch Loans (1-30 days)","451-1","","Reserves for Possible Losses");
INSERT INTO heads VALUES("83","Specific Reserve for Substandard Loans (31-60 days)","451-2","","Reserves for Possible Losses");
INSERT INTO heads VALUES("84","Specific Reserve for Doubtful Loans (61-90 days)","451-3","","Reserves for Possible Losses");
INSERT INTO heads VALUES("85","Specific Reserve for Lost Loans (>91 days)","451-4","","Reserves for Possible Losses");
INSERT INTO heads VALUES("86","General Reserves","452","","Reserves for Possible Losses");
INSERT INTO heads VALUES("87","Land and Buildings","471","","Property and Equipment");
INSERT INTO heads VALUES("88","Office Equipment","472","","Property and Equipment");
INSERT INTO heads VALUES("89","Plant and Machinery","473","","Property and Equipment");
INSERT INTO heads VALUES("90","Vehicles","474","","Property and Equipment");
INSERT INTO heads VALUES("91","Furniture and Fixture","475","","Property and Equipment");
INSERT INTO heads VALUES("92","Computer and other Equipment","476","","Property and Equipment");
INSERT INTO heads VALUES("93","Intangible Assets","477","","Property and Equipment");
INSERT INTO heads VALUES("94","Other Fixed Assets","478","","Property and Equipment");
INSERT INTO heads VALUES("95","Accumulated Amortisation and Depreciation","479","","Property and Equipment");
INSERT INTO heads VALUES("96","Prepayments","481","","Prepayments and Other Receivables");
INSERT INTO heads VALUES("97","Short-term Receivables","482","","Prepayments and Other Receivables");
INSERT INTO heads VALUES("98","Customers Deposits","501","","Customers Deposits");
INSERT INTO heads VALUES("99","Term Deposits","502","","Customers Deposits");
INSERT INTO heads VALUES("100","Interest Payable on Savings Deposits","531","","Interest Payable");
INSERT INTO heads VALUES("101","Interest Payable on Term Deposits","532","","Interest Payable");
INSERT INTO heads VALUES("102","Interest Payable on Short-term Bank Loans","533","","Interest Payable");
INSERT INTO heads VALUES("103","Interest Payable on Long-term Bank Loans","534","","Interest Payable");
INSERT INTO heads VALUES("104","Interest Payable on Other Borrowings","535","","Interest Payable");
INSERT INTO heads VALUES("105","Accounts Payable","541","","Accounts Payable");
INSERT INTO heads VALUES("106","Income Tax","561","","Taxes Payable");
INSERT INTO heads VALUES("107","Withholding Tax","562","","Taxes Payable");
INSERT INTO heads VALUES("108","Social security Tax","563","","Taxes Payable");
INSERT INTO heads VALUES("109","Profit Tax","564","","Taxes Payable");
INSERT INTO heads VALUES("110","Minimum Tax","565","","Taxes Payable");
INSERT INTO heads VALUES("111","Other Taxes","569","","Taxes Payable");
INSERT INTO heads VALUES("112","Deferred Grant Revenue","571","","Deferred Revenue");
INSERT INTO heads VALUES("113","Deferred Revenue due to Donated Fixed Assets","572","","Deferred Revenue");
INSERT INTO heads VALUES("114","Other Deferred Revenue Items","573","","Deferred Revenue");
INSERT INTO heads VALUES("115","Suspense Items (unidentified)","581","","Suspense and/or Clearing Accounts");
INSERT INTO heads VALUES("116","Clearing Account","582","","Suspense and/or Clearing Accounts");
INSERT INTO heads VALUES("117","Other Liabilities","591","","Other Liability Accounts");
INSERT INTO heads VALUES("118","Capital","601","","Capital");
INSERT INTO heads VALUES("119","Retained Earnings","621","","Retained Earnings/ (Deficit)");
INSERT INTO heads VALUES("120","Net Income (Loss) for the Current Year ","651","","Net Income (Loss)");
INSERT INTO heads VALUES("121","Dividends Declared","661","","Dividends Declared");
INSERT INTO heads VALUES("122","Investment in CBN Approved Government Securities","431","","Investments");
INSERT INTO heads VALUES("123","Loans to other MFBs","432","","Investments");
INSERT INTO heads VALUES("124","Other Investments","434","","Investments");
INSERT INTO heads VALUES("125","Current Accounts","421","","Accounts with Banks and other Financial Institutions");
INSERT INTO heads VALUES("126","Savings Accounts","422","","Accounts with Banks and other Financial Institutions");
INSERT INTO heads VALUES("127","Other Accounts with Banks","423","","Accounts with Banks and other Financial Institutions");
INSERT INTO heads VALUES("128","Cash on Hand","401","","Cash, Cheques and Other Cash Items");
INSERT INTO heads VALUES("129","Petty Cash","402","","Cash, Cheques and Other Cash Items");
INSERT INTO heads VALUES("130","Vault Cash","403","","Cash, Cheques and Other Cash Items");
INSERT INTO heads VALUES("131","Cheques in Transit","404","","Cash, Cheques and Other Cash Items");
INSERT INTO heads VALUES("132","Other Cash Accounts","405","","Cash, Cheques and Other Cash Items");


DROP TABLE IF EXISTS interbank;

CREATE TABLE `interbank` (
  `ID` bigint(11) NOT NULL auto_increment,
  `r_Date` date default NULL,
  `r_Branch` varchar(50) default NULL,
  `r_Officer` varchar(50) default NULL,
  `r_Amount` decimal(13,2) default NULL,
  `p_Date` date default NULL,
  `p_Branch` varchar(50) default NULL,
  `p_Officer` varchar(50) default NULL,
  `p_Amount` decimal(13,2) default NULL,
  `Balance` decimal(13,2) default NULL,
  `r_Narration` varchar(150) default NULL,
  `p_Narration` varchar(150) default NULL,
  `Received By` varchar(50) default NULL,
  `Paid By` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO interbank VALUES("1","2012-05-10","Tafo","him","400.00","","","","","","cash for withdrawal","","me","");


DROP TABLE IF EXISTS lease application;

;



DROP TABLE IF EXISTS lease payment;

;



DROP TABLE IF EXISTS lease type;

;



DROP TABLE IF EXISTS leasing;

CREATE TABLE `leasing` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Company Name` varchar(50) default NULL,
  `First Name` varchar(50) default NULL,
  `Last Name` varchar(50) default NULL,
  `Address` varchar(150) default NULL,
  `City` varchar(50) default NULL,
  `Phone` varchar(50) default NULL,
  `GSM` varchar(50) default NULL,
  `Position in Coy` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `Equip Type` varchar(50) default NULL,
  `Type of Lease` varchar(50) default NULL,
  `DoB` date default NULL,
  `Supplier` varchar(50) default NULL,
  `Model` varchar(50) default NULL,
  `Equip Make` varchar(50) default NULL,
  `Price` decimal(11,2) default NULL,
  `Account Number` varchar(50) default NULL,
  `Leasing Officer` varchar(50) default NULL,
  `Interest Rate` decimal(6,2) default NULL,
  `Lease Date` date default NULL,
  `Lease Status` varchar(50) default NULL,
  `Contribution` int(4) default NULL,
  `Late Charge` decimal(7,2) default NULL,
  `Payment Frequency` int(4) default NULL,
  `No of Payment` int(4) default NULL,
  `Payment Type` varchar(50) default NULL,
  `Equipment Descr` text,
  `Invoice No` varchar(20) default NULL,
  `Guarantor` varchar(50) default NULL,
  `Guarantor Contact` varchar(150) default NULL,
  `Guarantor Occupation` varchar(50) default NULL,
  `Collateral` varchar(50) default NULL,
  `Collateral Location` varchar(50) default NULL,
  `Collateral Value` decimal(11,2) default NULL,
  `Collateral Title` varchar(70) default NULL,
  `Collateral Description` text,
  `Balance` decimal(11,2) default NULL,
  `Payment todate` decimal(11,2) default NULL,
  `Periodic Repayment` decimal(11,2) default NULL,
  `Daily Interest` decimal(11,2) default NULL,
  `Daily Principal` decimal(11,2) default NULL,
  `Daily Repay` decimal(11,2) default NULL,
  `Monthly Interest` decimal(11,2) default NULL,
  `Total Interest` decimal(11,2) default NULL,
  `Interest toDate` decimal(11,2) default NULL,
  `Monthly Principal` decimal(11,2) default NULL,
  `PPayment todate` decimal(11,2) default NULL,
  `PBalance` decimal(11,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS lga;

CREATE TABLE `lga` (
  `State` varchar(50) default NULL,
  `LGA` varchar(50) default NULL,
  `LGAID` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`LGAID`)
) ENGINE=MyISAM AUTO_INCREMENT=825 DEFAULT CHARSET=latin1;

INSERT INTO lga VALUES("RIVERS","Asaritoru","2");
INSERT INTO lga VALUES("IMO","Aboh mbaise","3");
INSERT INTO lga VALUES("OYO","Oluyole","5");
INSERT INTO lga VALUES("CROSS RIVER","Bekwara","6");
INSERT INTO lga VALUES("OGUN","Abeokuta east","7");
INSERT INTO lga VALUES("OGUN","Yemoji","8");
INSERT INTO lga VALUES("EDO","Etsakor","9");
INSERT INTO lga VALUES("DELTA","Ethiope west","10");
INSERT INTO lga VALUES("ANAMBRA","Idemili","11");
INSERT INTO lga VALUES("KOGI","Ijumu iyara","12");
INSERT INTO lga VALUES("ABIA","Aba north","14");
INSERT INTO lga VALUES("ABIA","Aba south","15");
INSERT INTO lga VALUES("ABIA","Arochukwu","16");
INSERT INTO lga VALUES("ABIA","Bende","17");
INSERT INTO lga VALUES("ABIA","Ikwuano","18");
INSERT INTO lga VALUES("ABIA","Isiala-ngwa north","19");
INSERT INTO lga VALUES("ABIA","Isiala-ngwa south","20");
INSERT INTO lga VALUES("ABIA","Isukwuato","21");
INSERT INTO lga VALUES("ABIA","Obiomangwa","22");
INSERT INTO lga VALUES("ABIA","Ohafia","23");
INSERT INTO lga VALUES("ABIA","Osisioma ngwa","24");
INSERT INTO lga VALUES("ABIA","Ugwunagbo","25");
INSERT INTO lga VALUES("ABIA","Ukwa east","26");
INSERT INTO lga VALUES("ABIA","Ukwa west","27");
INSERT INTO lga VALUES("ABIA","Umuahia north","28");
INSERT INTO lga VALUES("ABIA","Umuahia south","29");
INSERT INTO lga VALUES("ABIA","Umu-nneochi","30");
INSERT INTO lga VALUES("ADAMAWA","Demsa","31");
INSERT INTO lga VALUES("ADAMAWA","Fufore","32");
INSERT INTO lga VALUES("ADAMAWA","Ganye","33");
INSERT INTO lga VALUES("ADAMAWA","Girei","34");
INSERT INTO lga VALUES("ADAMAWA","Gombi","35");
INSERT INTO lga VALUES("ADAMAWA","Guyuk","36");
INSERT INTO lga VALUES("ADAMAWA","Hong","37");
INSERT INTO lga VALUES("ADAMAWA","Jada","38");
INSERT INTO lga VALUES("ADAMAWA","Lamurde","39");
INSERT INTO lga VALUES("ADAMAWA","Madagali","40");
INSERT INTO lga VALUES("ADAMAWA","Maiha","41");
INSERT INTO lga VALUES("ADAMAWA","Mayo-belwa","42");
INSERT INTO lga VALUES("ADAMAWA","Michika","43");
INSERT INTO lga VALUES("ADAMAWA","Mubi north","44");
INSERT INTO lga VALUES("ADAMAWA","Mubi south","45");
INSERT INTO lga VALUES("ADAMAWA","Numan","46");
INSERT INTO lga VALUES("ADAMAWA","Shelleng","47");
INSERT INTO lga VALUES("ADAMAWA","Song","48");
INSERT INTO lga VALUES("ADAMAWA","Toungo","49");
INSERT INTO lga VALUES("ADAMAWA","Yola north","50");
INSERT INTO lga VALUES("ADAMAWA","Yola south","51");
INSERT INTO lga VALUES("AKWA IBOM","Abak","52");
INSERT INTO lga VALUES("AKWA IBOM","Eastern obolo","53");
INSERT INTO lga VALUES("AKWA IBOM","Eket","54");
INSERT INTO lga VALUES("AKWA IBOM","Esit eket","55");
INSERT INTO lga VALUES("AKWA IBOM","Essien udim","56");
INSERT INTO lga VALUES("AKWA IBOM","Etim ekpo","57");
INSERT INTO lga VALUES("AKWA IBOM","Etinan","58");
INSERT INTO lga VALUES("AKWA IBOM","Ibeno","59");
INSERT INTO lga VALUES("AKWA IBOM","Ibesikpo asutan","60");
INSERT INTO lga VALUES("AKWA IBOM","Ibiono ibom","61");
INSERT INTO lga VALUES("AKWA IBOM","Ika","62");
INSERT INTO lga VALUES("AKWA IBOM","Ikono","63");
INSERT INTO lga VALUES("AKWA IBOM","Ikot abasi","64");
INSERT INTO lga VALUES("AKWA IBOM","Ikot ekpene","65");
INSERT INTO lga VALUES("AKWA IBOM","Ini","66");
INSERT INTO lga VALUES("AKWA IBOM","Itu","67");
INSERT INTO lga VALUES("AKWA IBOM","Mbo","68");
INSERT INTO lga VALUES("AKWA IBOM","Mkpat enin","69");
INSERT INTO lga VALUES("AKWA IBOM","Nsit atai","70");
INSERT INTO lga VALUES("AKWA IBOM","Nsit ibom","71");
INSERT INTO lga VALUES("AKWA IBOM","Nsit ubium","72");
INSERT INTO lga VALUES("AKWA IBOM","Uruan","73");
INSERT INTO lga VALUES("AKWA IBOM","Urue-offong/oruko","74");
INSERT INTO lga VALUES("AKWA IBOM","Uyo","75");
INSERT INTO lga VALUES("ANAMBRA","Aguata","76");
INSERT INTO lga VALUES("ANAMBRA","Anambra east","77");
INSERT INTO lga VALUES("ANAMBRA","Anambra west","78");
INSERT INTO lga VALUES("ANAMBRA","Anaocha","79");
INSERT INTO lga VALUES("ANAMBRA","Awka north","80");
INSERT INTO lga VALUES("ANAMBRA","Awka south","81");
INSERT INTO lga VALUES("ANAMBRA","Ayamelum","82");
INSERT INTO lga VALUES("ANAMBRA","Dunukofia","83");
INSERT INTO lga VALUES("ANAMBRA","Ekwusigo","84");
INSERT INTO lga VALUES("ANAMBRA","Idemili north","85");
INSERT INTO lga VALUES("ANAMBRA","Idemili south","86");
INSERT INTO lga VALUES("ANAMBRA","Ihiala","87");
INSERT INTO lga VALUES("ANAMBRA","Njikoka","88");
INSERT INTO lga VALUES("ANAMBRA","Nnewi north","89");
INSERT INTO lga VALUES("CROSS RIVER","Obanliku","90");
INSERT INTO lga VALUES("CROSS RIVER","Obubra","91");
INSERT INTO lga VALUES("CROSS RIVER","Obudu","92");
INSERT INTO lga VALUES("CROSS RIVER","Odukpani","93");
INSERT INTO lga VALUES("CROSS RIVER","Ogoja","94");
INSERT INTO lga VALUES("CROSS RIVER","Yakurr","95");
INSERT INTO lga VALUES("CROSS RIVER","Yala","96");
INSERT INTO lga VALUES("DELTA","Aniocha north","97");
INSERT INTO lga VALUES("DELTA","Aniocha south","98");
INSERT INTO lga VALUES("DELTA","Bomadi","99");
INSERT INTO lga VALUES("DELTA","Burutu","100");
INSERT INTO lga VALUES("DELTA","Ethiope east","101");
INSERT INTO lga VALUES("DELTA","Ethiope west","102");
INSERT INTO lga VALUES("DELTA","Ika north","103");
INSERT INTO lga VALUES("DELTA","Ika south","104");
INSERT INTO lga VALUES("DELTA","Isoko north","105");
INSERT INTO lga VALUES("DELTA","Isoko south","106");
INSERT INTO lga VALUES("DELTA","Ndokwa east","107");
INSERT INTO lga VALUES("DELTA","Ndokwa west","108");
INSERT INTO lga VALUES("DELTA","Okpe","109");
INSERT INTO lga VALUES("DELTA","Oshimili north","110");
INSERT INTO lga VALUES("DELTA","Oshimili south","111");
INSERT INTO lga VALUES("DELTA","Patani","112");
INSERT INTO lga VALUES("DELTA","Sapele","113");
INSERT INTO lga VALUES("DELTA","Udu","114");
INSERT INTO lga VALUES("DELTA","Ughelli north","115");
INSERT INTO lga VALUES("DELTA","Ughelli south","116");
INSERT INTO lga VALUES("DELTA","Ukwuani","117");
INSERT INTO lga VALUES("DELTA","Uvwie","118");
INSERT INTO lga VALUES("DELTA","Warri north","119");
INSERT INTO lga VALUES("DELTA","Warri south","120");
INSERT INTO lga VALUES("DELTA","Warri south west","121");
INSERT INTO lga VALUES("EBONYI","Abakaliki","122");
INSERT INTO lga VALUES("EBONYI","Afikpo north","123");
INSERT INTO lga VALUES("EBONYI","Afikpo south","124");
INSERT INTO lga VALUES("EBONYI","Ebonyi","125");
INSERT INTO lga VALUES("EBONYI","Ezza north","126");
INSERT INTO lga VALUES("EBONYI","Ezza south","127");
INSERT INTO lga VALUES("EBONYI","Ikwo","128");
INSERT INTO lga VALUES("EBONYI","Ishielu","129");
INSERT INTO lga VALUES("EBONYI","Ivo","130");
INSERT INTO lga VALUES("EBONYI","Izzi","131");
INSERT INTO lga VALUES("EBONYI","Ohaozara","132");
INSERT INTO lga VALUES("EBONYI","Ohaukwu","133");
INSERT INTO lga VALUES("EBONYI","Onicha","134");
INSERT INTO lga VALUES("EDO","Akoko-edo","135");
INSERT INTO lga VALUES("EDO","Egor","136");
INSERT INTO lga VALUES("EDO","Esan central","137");
INSERT INTO lga VALUES("EDO","Esan north east","138");
INSERT INTO lga VALUES("EDO","Esan south east","139");
INSERT INTO lga VALUES("EDO","Esan west","140");
INSERT INTO lga VALUES("EDO","Etsako central","141");
INSERT INTO lga VALUES("EDO","Etsako east","142");
INSERT INTO lga VALUES("EDO","Etsako west","143");
INSERT INTO lga VALUES("EDO","Igueben","144");
INSERT INTO lga VALUES("EDO","Ikpoba-okha","145");
INSERT INTO lga VALUES("EDO","Oredo","146");
INSERT INTO lga VALUES("EDO","Orhionmwon","147");
INSERT INTO lga VALUES("EDO","Ovia north east","148");
INSERT INTO lga VALUES("EDO","Ovia south west","149");
INSERT INTO lga VALUES("EDO","Owan east","150");
INSERT INTO lga VALUES("EDO","Owan west","151");
INSERT INTO lga VALUES("EDO","Uhunmwonde","152");
INSERT INTO lga VALUES("EKITI","Ado ekiti","153");
INSERT INTO lga VALUES("EKITI","Aiyekire","154");
INSERT INTO lga VALUES("EKITI","Efon","155");
INSERT INTO lga VALUES("EKITI","Ekiti east","156");
INSERT INTO lga VALUES("EKITI","Ekiti south west","157");
INSERT INTO lga VALUES("EKITI","Ekiti west","158");
INSERT INTO lga VALUES("EKITI","Emure","159");
INSERT INTO lga VALUES("EKITI","Ido-osi","160");
INSERT INTO lga VALUES("EKITI","Ijero","161");
INSERT INTO lga VALUES("EKITI","Ikere","162");
INSERT INTO lga VALUES("EKITI","Ikole","163");
INSERT INTO lga VALUES("EKITI","Ilejemeji","164");
INSERT INTO lga VALUES("EKITI","Irepodun/ifelodun","165");
INSERT INTO lga VALUES("EKITI","Ise/orun","166");
INSERT INTO lga VALUES("EKITI","Moba","167");
INSERT INTO lga VALUES("EKITI","Oye","168");
INSERT INTO lga VALUES("ENUGU","Aninri","169");
INSERT INTO lga VALUES("ENUGU","Awgu","170");
INSERT INTO lga VALUES("ENUGU","Enugu east","171");
INSERT INTO lga VALUES("ENUGU","Enugu north","172");
INSERT INTO lga VALUES("ENUGU","Enugu south","173");
INSERT INTO lga VALUES("ENUGU","Ezeagu","174");
INSERT INTO lga VALUES("ENUGU","Enugu","175");
INSERT INTO lga VALUES("ENUGU","Igbo-etit","176");
INSERT INTO lga VALUES("ENUGU","Igbo-eze north","177");
INSERT INTO lga VALUES("ENUGU","Igho-eze south","178");
INSERT INTO lga VALUES("ENUGU","Isi-uzo","179");
INSERT INTO lga VALUES("ENUGU","Nkanu east","180");
INSERT INTO lga VALUES("ENUGU","Nkanu west","181");
INSERT INTO lga VALUES("ANAMBRA","Nnewi south","182");
INSERT INTO lga VALUES("ANAMBRA","Ogbaru","183");
INSERT INTO lga VALUES("ANAMBRA","Onitsha north","184");
INSERT INTO lga VALUES("ANAMBRA","Onitsha south","185");
INSERT INTO lga VALUES("ANAMBRA","Orumba north","186");
INSERT INTO lga VALUES("ANAMBRA","Orumba south","187");
INSERT INTO lga VALUES("ANAMBRA","Oyi","188");
INSERT INTO lga VALUES("BAUCHI","Alkaleri","189");
INSERT INTO lga VALUES("BAUCHI","Bauchi","190");
INSERT INTO lga VALUES("BAUCHI","Bogoro","191");
INSERT INTO lga VALUES("BAUCHI","Damban","192");
INSERT INTO lga VALUES("BAUCHI","Darazo","193");
INSERT INTO lga VALUES("BAUCHI","Dass","194");
INSERT INTO lga VALUES("BAUCHI","Gamawa","195");
INSERT INTO lga VALUES("BAUCHI","Ganjuwa","196");
INSERT INTO lga VALUES("BAUCHI","Giade","197");
INSERT INTO lga VALUES("BAUCHI","Itas/gadau","198");
INSERT INTO lga VALUES("BAUCHI","Jama\'are","199");
INSERT INTO lga VALUES("BAUCHI","Katagun","200");
INSERT INTO lga VALUES("ZAMFARA","Gusau","201");
INSERT INTO lga VALUES("BAUCHI","Kirfi","202");
INSERT INTO lga VALUES("BAUCHI","Misau","203");
INSERT INTO lga VALUES("BAUCHI","Ningi","204");
INSERT INTO lga VALUES("BAUCHI","Shira","205");
INSERT INTO lga VALUES("BAUCHI","Tafawa-balewa","206");
INSERT INTO lga VALUES("BAUCHI","Toro","207");
INSERT INTO lga VALUES("BAUCHI","Warji","208");
INSERT INTO lga VALUES("BAUCHI","Zaki","209");
INSERT INTO lga VALUES("BAYELSA","Brass","210");
INSERT INTO lga VALUES("BAYELSA","Ekeremor","211");
INSERT INTO lga VALUES("BAYELSA","Kolokuma/opokuma","212");
INSERT INTO lga VALUES("BAYELSA","Nembe","213");
INSERT INTO lga VALUES("BAYELSA","Ogbia","214");
INSERT INTO lga VALUES("BAYELSA","Sagbama","215");
INSERT INTO lga VALUES("BAYELSA","Southern ijaw","216");
INSERT INTO lga VALUES("BAYELSA","Yenegoa","217");
INSERT INTO lga VALUES("BENUE","Ado","218");
INSERT INTO lga VALUES("BENUE","Agatu","219");
INSERT INTO lga VALUES("BENUE","Apa","220");
INSERT INTO lga VALUES("BENUE","Buruku","221");
INSERT INTO lga VALUES("BENUE","Gboko","222");
INSERT INTO lga VALUES("BENUE","Guma","223");
INSERT INTO lga VALUES("BENUE","Gwer east","224");
INSERT INTO lga VALUES("BENUE","Gwer west","225");
INSERT INTO lga VALUES("BENUE","Katsina-ala","226");
INSERT INTO lga VALUES("BENUE","Konshisha","227");
INSERT INTO lga VALUES("BENUE","Kwande","228");
INSERT INTO lga VALUES("BENUE","Logo","229");
INSERT INTO lga VALUES("BENUE","Makurdi","230");
INSERT INTO lga VALUES("BENUE","Obi","231");
INSERT INTO lga VALUES("BENUE","Ogbadibo","232");
INSERT INTO lga VALUES("BENUE","Oju","233");
INSERT INTO lga VALUES("BENUE","Okpokwu","234");
INSERT INTO lga VALUES("BENUE","Ohimini","235");
INSERT INTO lga VALUES("BENUE","Oturkpo","236");
INSERT INTO lga VALUES("BENUE","Tarka","237");
INSERT INTO lga VALUES("BENUE","Ukum","238");
INSERT INTO lga VALUES("BENUE","Ushongo","239");
INSERT INTO lga VALUES("BENUE","Vandeikya","240");
INSERT INTO lga VALUES("BORNO","Abadam","241");
INSERT INTO lga VALUES("BORNO","Askira/uba","242");
INSERT INTO lga VALUES("BORNO","Bama","243");
INSERT INTO lga VALUES("BORNO","Bayo","244");
INSERT INTO lga VALUES("BORNO","Biu","245");
INSERT INTO lga VALUES("BORNO","Chibok","246");
INSERT INTO lga VALUES("BORNO","Damboa","247");
INSERT INTO lga VALUES("BORNO","Dikwa","248");
INSERT INTO lga VALUES("BORNO","Gubio","249");
INSERT INTO lga VALUES("BORNO","Guzamala","250");
INSERT INTO lga VALUES("BORNO","Gwoza","251");
INSERT INTO lga VALUES("BORNO","Hawul","252");
INSERT INTO lga VALUES("BORNO","Jere","253");
INSERT INTO lga VALUES("BORNO","Kaga","254");
INSERT INTO lga VALUES("BORNO","Kala/balge","255");
INSERT INTO lga VALUES("BORNO","Konduga","256");
INSERT INTO lga VALUES("BORNO","Kukawa","257");
INSERT INTO lga VALUES("BORNO","Kwaya kusar","258");
INSERT INTO lga VALUES("BORNO","Mafa","259");
INSERT INTO lga VALUES("BORNO","Magumeri","260");
INSERT INTO lga VALUES("BORNO","Maiduguri","261");
INSERT INTO lga VALUES("BORNO","Marte","262");
INSERT INTO lga VALUES("BORNO","Mobbar","263");
INSERT INTO lga VALUES("BORNO","Monguno","264");
INSERT INTO lga VALUES("BORNO","Ngala","265");
INSERT INTO lga VALUES("BORNO","Nganzai","266");
INSERT INTO lga VALUES("BORNO","Shani","267");
INSERT INTO lga VALUES("CROSS RIVER","Abi","268");
INSERT INTO lga VALUES("CROSS RIVER","Akamkpa","269");
INSERT INTO lga VALUES("CROSS RIVER","Akpabuyo","270");
INSERT INTO lga VALUES("CROSS RIVER","Bakassi","271");
INSERT INTO lga VALUES("CROSS RIVER","Bekwara","272");
INSERT INTO lga VALUES("CROSS RIVER","Biase","273");
INSERT INTO lga VALUES("CROSS RIVER","Boki","274");
INSERT INTO lga VALUES("CROSS RIVER","Calabar-municipal","275");
INSERT INTO lga VALUES("CROSS RIVER","Calabar south","276");
INSERT INTO lga VALUES("CROSS RIVER","Etung","277");
INSERT INTO lga VALUES("CROSS RIVER","Ikom","278");
INSERT INTO lga VALUES("ENUGU","Nsukka","279");
INSERT INTO lga VALUES("ENUGU","Oji-river","280");
INSERT INTO lga VALUES("ENUGU","Udenu","281");
INSERT INTO lga VALUES("ENUGU","Udi","282");
INSERT INTO lga VALUES("ENUGU","Uzo-uwani","283");
INSERT INTO lga VALUES("GOMBE","Akko","284");
INSERT INTO lga VALUES("GOMBE","Balanga","285");
INSERT INTO lga VALUES("GOMBE","Billiri","286");
INSERT INTO lga VALUES("GOMBE","Dukku","287");
INSERT INTO lga VALUES("GOMBE","Funakaye","288");
INSERT INTO lga VALUES("GOMBE","Gombe","289");
INSERT INTO lga VALUES("GOMBE","Kaltungo","290");
INSERT INTO lga VALUES("GOMBE","Kwami","291");
INSERT INTO lga VALUES("GOMBE","Nafada","292");
INSERT INTO lga VALUES("GOMBE","Shomgom","293");
INSERT INTO lga VALUES("GOMBE","Yamaltu/deba","294");
INSERT INTO lga VALUES("IMO","Ahiazu-mbaise","295");
INSERT INTO lga VALUES("IMO","Ehime-mbano","296");
INSERT INTO lga VALUES("IMO","Ezinihitte","297");
INSERT INTO lga VALUES("IMO","Ideato north","298");
INSERT INTO lga VALUES("IMO","Ideato south","299");
INSERT INTO lga VALUES("IMO","Ihitte-uboma","300");
INSERT INTO lga VALUES("IMO","Ikeduru","301");
INSERT INTO lga VALUES("IMO","Isiala mbano","302");
INSERT INTO lga VALUES("IMO","Isu","303");
INSERT INTO lga VALUES("IMO","Mbaitoli","304");
INSERT INTO lga VALUES("IMO","Ngor-okpala","305");
INSERT INTO lga VALUES("IMO","Njaba","306");
INSERT INTO lga VALUES("IMO","Nwangele","307");
INSERT INTO lga VALUES("IMO","Nkwerre","308");
INSERT INTO lga VALUES("IMO","Obowo","309");
INSERT INTO lga VALUES("IMO","Oguta","310");
INSERT INTO lga VALUES("IMO","Ohaji/egbema","311");
INSERT INTO lga VALUES("IMO","Okigwe","312");
INSERT INTO lga VALUES("IMO","Orlu","313");
INSERT INTO lga VALUES("IMO","Orsu","314");
INSERT INTO lga VALUES("IMO","Oru east","315");
INSERT INTO lga VALUES("IMO","Oru west","316");
INSERT INTO lga VALUES("IMO","Owerri muni.","317");
INSERT INTO lga VALUES("IMO","Owerri north","318");
INSERT INTO lga VALUES("IMO","Owerri west","319");
INSERT INTO lga VALUES("IMO","Onuimo","320");
INSERT INTO lga VALUES("JIGAWA","Auyo","321");
INSERT INTO lga VALUES("JIGAWA","Babura","322");
INSERT INTO lga VALUES("JIGAWA","Birnin kudu","323");
INSERT INTO lga VALUES("JIGAWA","Biriniwa","324");
INSERT INTO lga VALUES("JIGAWA","Buji","325");
INSERT INTO lga VALUES("JIGAWA","Dutse","326");
INSERT INTO lga VALUES("JIGAWA","Gagarawa","327");
INSERT INTO lga VALUES("JIGAWA","Garki","328");
INSERT INTO lga VALUES("JIGAWA","Gumel","329");
INSERT INTO lga VALUES("JIGAWA","Guri","330");
INSERT INTO lga VALUES("JIGAWA","Gwaram","331");
INSERT INTO lga VALUES("JIGAWA","Gwiwa","332");
INSERT INTO lga VALUES("JIGAWA","Hadejia","333");
INSERT INTO lga VALUES("JIGAWA","Jahun","334");
INSERT INTO lga VALUES("JIGAWA","Kafin","335");
INSERT INTO lga VALUES("JIGAWA","Hausa","336");
INSERT INTO lga VALUES("JIGAWA","Kaugama","337");
INSERT INTO lga VALUES("JIGAWA","Kazaure","338");
INSERT INTO lga VALUES("JIGAWA","Kiri kasamma","339");
INSERT INTO lga VALUES("JIGAWA","Kiyawa","340");
INSERT INTO lga VALUES("JIGAWA","Maigatari","341");
INSERT INTO lga VALUES("JIGAWA","Malam madori","342");
INSERT INTO lga VALUES("JIGAWA","Miga","343");
INSERT INTO lga VALUES("JIGAWA","Ringim","344");
INSERT INTO lga VALUES("JIGAWA","Roni","345");
INSERT INTO lga VALUES("JIGAWA","Sule-tankarkar","346");
INSERT INTO lga VALUES("JIGAWA","Taura","347");
INSERT INTO lga VALUES("JIGAWA","Yankwashi","348");
INSERT INTO lga VALUES("KADUNA","Birnin-gwari","349");
INSERT INTO lga VALUES("KADUNA","Chikun","350");
INSERT INTO lga VALUES("KADUNA","Giwa","351");
INSERT INTO lga VALUES("KADUNA","Igabi","352");
INSERT INTO lga VALUES("KADUNA","Ikara","353");
INSERT INTO lga VALUES("KADUNA","Jaba","354");
INSERT INTO lga VALUES("KADUNA","Jema\'a","355");
INSERT INTO lga VALUES("KADUNA","Kachia","356");
INSERT INTO lga VALUES("KADUNA","Kaduna north","357");
INSERT INTO lga VALUES("KADUNA","Kaduna south","358");
INSERT INTO lga VALUES("KADUNA","Kagarko","359");
INSERT INTO lga VALUES("KADUNA","Kajuru","360");
INSERT INTO lga VALUES("KADUNA","Kaura","361");
INSERT INTO lga VALUES("KADUNA","Kubau","362");
INSERT INTO lga VALUES("KADUNA","Kudan","363");
INSERT INTO lga VALUES("KADUNA","Lere","364");
INSERT INTO lga VALUES("KADUNA","Makarfi","365");
INSERT INTO lga VALUES("KADUNA","Sabon-gari","366");
INSERT INTO lga VALUES("KADUNA","Sanga","367");
INSERT INTO lga VALUES("KADUNA","Soba","368");
INSERT INTO lga VALUES("KADUNA","Zangon-kataf","369");
INSERT INTO lga VALUES("KADUNA","Zaria","370");
INSERT INTO lga VALUES("KANO","Ajingi","371");
INSERT INTO lga VALUES("KANO","Albasu","372");
INSERT INTO lga VALUES("KANO","Bagwai","373");
INSERT INTO lga VALUES("KANO","Bebeji","374");
INSERT INTO lga VALUES("KANO","Bichi","375");
INSERT INTO lga VALUES("KANO","Bunkure","376");
INSERT INTO lga VALUES("KANO","Dala","377");
INSERT INTO lga VALUES("KANO","Dambatta","378");
INSERT INTO lga VALUES("KANO","Dawakin kudu","379");
INSERT INTO lga VALUES("KANO","Dawakin tofa","380");
INSERT INTO lga VALUES("KANO","Doguwa","381");
INSERT INTO lga VALUES("KANO","Fagge","382");
INSERT INTO lga VALUES("KANO","Gabasawa","383");
INSERT INTO lga VALUES("KANO","Garko","384");
INSERT INTO lga VALUES("KANO","Garum mallarn","385");
INSERT INTO lga VALUES("KANO","Gaya","386");
INSERT INTO lga VALUES("KANO","Gezawa","387");
INSERT INTO lga VALUES("KANO","Gwale","388");
INSERT INTO lga VALUES("KANO","Gwarzo","389");
INSERT INTO lga VALUES("KANO","Kabo","390");
INSERT INTO lga VALUES("KANO","Kano municipal","391");
INSERT INTO lga VALUES("KANO","Karaye","392");
INSERT INTO lga VALUES("KANO","Kibiya","393");
INSERT INTO lga VALUES("KANO","Kiru","394");
INSERT INTO lga VALUES("KANO","Kumbotso","395");
INSERT INTO lga VALUES("KANO","Kunchi","396");
INSERT INTO lga VALUES("KANO","Kura","397");
INSERT INTO lga VALUES("KANO","Madobi","398");
INSERT INTO lga VALUES("KANO","Makoda","399");
INSERT INTO lga VALUES("KANO","Minjibir","400");
INSERT INTO lga VALUES("KANO","Nasarawa","401");
INSERT INTO lga VALUES("KANO","Rano","402");
INSERT INTO lga VALUES("KANO","Rimin gado","403");
INSERT INTO lga VALUES("KANO","Rogo","404");
INSERT INTO lga VALUES("KANO","Shanono","405");
INSERT INTO lga VALUES("KANO","Sumaila","406");
INSERT INTO lga VALUES("KANO","Takai","407");
INSERT INTO lga VALUES("KANO","Tarauni","408");
INSERT INTO lga VALUES("KANO","Tofa","409");
INSERT INTO lga VALUES("KANO","Tsanyawa","410");
INSERT INTO lga VALUES("KANO","Tudun wada","411");
INSERT INTO lga VALUES("KANO","Ungogo","412");
INSERT INTO lga VALUES("KANO","Warawa","413");
INSERT INTO lga VALUES("KANO","Wudil","414");
INSERT INTO lga VALUES("KATSINA","Bakori","415");
INSERT INTO lga VALUES("KATSINA","Batagarawa","416");
INSERT INTO lga VALUES("KATSINA","Batsari","417");
INSERT INTO lga VALUES("KATSINA","Baure","418");
INSERT INTO lga VALUES("KATSINA","Bindawa","419");
INSERT INTO lga VALUES("KATSINA","Charanchi","420");
INSERT INTO lga VALUES("KATSINA","Dandume","421");
INSERT INTO lga VALUES("KATSINA","Danja","422");
INSERT INTO lga VALUES("KATSINA","Dan musa","423");
INSERT INTO lga VALUES("KATSINA","Daura","424");
INSERT INTO lga VALUES("KATSINA","Dutsi","425");
INSERT INTO lga VALUES("KATSINA","Dutsin-ma","426");
INSERT INTO lga VALUES("KATSINA","Faskari","427");
INSERT INTO lga VALUES("KATSINA","Funtua","428");
INSERT INTO lga VALUES("KATSINA","Ingawa","429");
INSERT INTO lga VALUES("KATSINA","Jibia","430");
INSERT INTO lga VALUES("KATSINA","Kafur","431");
INSERT INTO lga VALUES("KATSINA","Kaita","432");
INSERT INTO lga VALUES("KATSINA","Kankara","433");
INSERT INTO lga VALUES("KATSINA","Kankia","434");
INSERT INTO lga VALUES("KATSINA","Katsina","435");
INSERT INTO lga VALUES("KATSINA","Kurfi","436");
INSERT INTO lga VALUES("KATSINA","Kusada","437");
INSERT INTO lga VALUES("KATSINA","Mai\'adua","438");
INSERT INTO lga VALUES("KATSINA","Malumfashi","439");
INSERT INTO lga VALUES("KATSINA","Mani","440");
INSERT INTO lga VALUES("KATSINA","Mashi","441");
INSERT INTO lga VALUES("KATSINA","Matazu","442");
INSERT INTO lga VALUES("KATSINA","Musawa","443");
INSERT INTO lga VALUES("KATSINA","Rimi","444");
INSERT INTO lga VALUES("KATSINA","Sabuwa","445");
INSERT INTO lga VALUES("KATSINA","Safana","446");
INSERT INTO lga VALUES("KATSINA","Sandamu","447");
INSERT INTO lga VALUES("KATSINA","Zongo","448");
INSERT INTO lga VALUES("KEBBI","Aleiro","449");
INSERT INTO lga VALUES("KEBBI","Arewa-dandi","450");
INSERT INTO lga VALUES("KEBBI","Argungu","451");
INSERT INTO lga VALUES("KEBBI","Augie","452");
INSERT INTO lga VALUES("KEBBI","Bagudo","453");
INSERT INTO lga VALUES("KEBBI","Birnin kebbi","454");
INSERT INTO lga VALUES("KEBBI","Bunza","455");
INSERT INTO lga VALUES("KEBBI","Dandi","456");
INSERT INTO lga VALUES("KEBBI","Fakai","457");
INSERT INTO lga VALUES("KEBBI","Gwandu","458");
INSERT INTO lga VALUES("KEBBI","Jega","459");
INSERT INTO lga VALUES("KEBBI","Kalgo","460");
INSERT INTO lga VALUES("KEBBI","Koko/besse","461");
INSERT INTO lga VALUES("KEBBI","Maiyama","462");
INSERT INTO lga VALUES("KEBBI","Ngaski","463");
INSERT INTO lga VALUES("KEBBI","Sakaba","464");
INSERT INTO lga VALUES("KEBBI","Shanga","465");
INSERT INTO lga VALUES("KEBBI","Suru","466");
INSERT INTO lga VALUES("KEBBI","Wasagu/danko","467");
INSERT INTO lga VALUES("KEBBI","Yauri","468");
INSERT INTO lga VALUES("KEBBI","Zuru","469");
INSERT INTO lga VALUES("KOGI","Adavi","470");
INSERT INTO lga VALUES("KOGI","Ajaojuta","471");
INSERT INTO lga VALUES("KOGI","Ankpa","472");
INSERT INTO lga VALUES("KOGI","Bassa","473");
INSERT INTO lga VALUES("KOGI","Dekina","474");
INSERT INTO lga VALUES("KOGI","Ibaji","475");
INSERT INTO lga VALUES("KOGI","Igalamela-odolu","476");
INSERT INTO lga VALUES("KOGI","Ijumu","477");
INSERT INTO lga VALUES("KOGI","Kabba/bunu","479");
INSERT INTO lga VALUES("KOGI","Kogi","480");
INSERT INTO lga VALUES("KOGI","Lokoja","481");
INSERT INTO lga VALUES("KOGI","Mopa-muro","482");
INSERT INTO lga VALUES("KOGI","Ofu","483");
INSERT INTO lga VALUES("KOGI","Ogori/megongo","484");
INSERT INTO lga VALUES("KOGI","Okehi","485");
INSERT INTO lga VALUES("KOGI","Olamabolo","486");
INSERT INTO lga VALUES("KOGI","Omala","487");
INSERT INTO lga VALUES("KOGI","Yagba east","488");
INSERT INTO lga VALUES("KOGI","Yagba west","489");
INSERT INTO lga VALUES("KWARA","Asa","490");
INSERT INTO lga VALUES("KWARA","Baruten","491");
INSERT INTO lga VALUES("KWARA","Edu","492");
INSERT INTO lga VALUES("KWARA","Ekiti","493");
INSERT INTO lga VALUES("KWARA","Ifelodun","494");
INSERT INTO lga VALUES("KWARA","Ilorin south","495");
INSERT INTO lga VALUES("KWARA","Ilorin west","496");
INSERT INTO lga VALUES("KWARA","Irepodun","497");
INSERT INTO lga VALUES("KWARA","Isin","498");
INSERT INTO lga VALUES("KWARA","Kaiama","499");
INSERT INTO lga VALUES("KWARA","Moro","500");
INSERT INTO lga VALUES("KWARA","Offa","501");
INSERT INTO lga VALUES("KWARA","Oke-ero","502");
INSERT INTO lga VALUES("KWARA","Oyun","503");
INSERT INTO lga VALUES("KWARA","Pategi","504");
INSERT INTO lga VALUES("LAGOS","Agege","505");
INSERT INTO lga VALUES("LAGOS","Ajeromi-ifelodun","506");
INSERT INTO lga VALUES("LAGOS","Alimosho","507");
INSERT INTO lga VALUES("LAGOS","Amuwo-odofin","508");
INSERT INTO lga VALUES("LAGOS","Apapa","509");
INSERT INTO lga VALUES("LAGOS","Badagry","510");
INSERT INTO lga VALUES("LAGOS","Epe","511");
INSERT INTO lga VALUES("LAGOS","Eti-osa","512");
INSERT INTO lga VALUES("LAGOS","Ibeju/lekki","513");
INSERT INTO lga VALUES("LAGOS","Ifako-ijaye","514");
INSERT INTO lga VALUES("LAGOS","Ikeja","515");
INSERT INTO lga VALUES("LAGOS","Ikorodu","516");
INSERT INTO lga VALUES("LAGOS","Kosofe","517");
INSERT INTO lga VALUES("LAGOS","Lagos island","518");
INSERT INTO lga VALUES("LAGOS","Lagos mainland","519");
INSERT INTO lga VALUES("LAGOS","Mushin","520");
INSERT INTO lga VALUES("LAGOS","Ojo","521");
INSERT INTO lga VALUES("LAGOS","Oshodi-isolo","522");
INSERT INTO lga VALUES("LAGOS","Shomolu","523");
INSERT INTO lga VALUES("LAGOS","Surulere","524");
INSERT INTO lga VALUES("NASARAWA","Akwanga","525");
INSERT INTO lga VALUES("NASARAWA","Awe","526");
INSERT INTO lga VALUES("NASARAWA","Doma","527");
INSERT INTO lga VALUES("NASARAWA","Karu","528");
INSERT INTO lga VALUES("NASARAWA","Keana","529");
INSERT INTO lga VALUES("NASARAWA","Keffi","530");
INSERT INTO lga VALUES("NASARAWA","Kokona","531");
INSERT INTO lga VALUES("NASARAWA","Lafia","532");
INSERT INTO lga VALUES("NASARAWA","Nasarawa","533");
INSERT INTO lga VALUES("NASARAWA","Nasarawa-eggon","534");
INSERT INTO lga VALUES("NASARAWA","Obi","535");
INSERT INTO lga VALUES("NASARAWA","Toto","536");
INSERT INTO lga VALUES("NASARAWA","Wamba","537");
INSERT INTO lga VALUES("NIGER","Agaie","538");
INSERT INTO lga VALUES("NIGER","Agwara","539");
INSERT INTO lga VALUES("NIGER","Bida","540");
INSERT INTO lga VALUES("NIGER","Borgu","541");
INSERT INTO lga VALUES("NIGER","Bosso","542");
INSERT INTO lga VALUES("NIGER","Chanchaga","543");
INSERT INTO lga VALUES("NIGER","Edati","544");
INSERT INTO lga VALUES("NIGER","Gbako","545");
INSERT INTO lga VALUES("NIGER","Gurara","546");
INSERT INTO lga VALUES("NIGER","Katcha","547");
INSERT INTO lga VALUES("NIGER","Kontagora","548");
INSERT INTO lga VALUES("NIGER","Lapai","549");
INSERT INTO lga VALUES("NIGER","Lavun","550");
INSERT INTO lga VALUES("NIGER","Magama","551");
INSERT INTO lga VALUES("NIGER","Mariga","552");
INSERT INTO lga VALUES("NIGER","Mashegu","553");
INSERT INTO lga VALUES("NIGER","Mokwa","554");
INSERT INTO lga VALUES("NIGER","Muya","555");
INSERT INTO lga VALUES("NIGER","Paikoro","556");
INSERT INTO lga VALUES("NIGER","Rafi","557");
INSERT INTO lga VALUES("NIGER","Rajau","558");
INSERT INTO lga VALUES("NIGER","Shiroro","559");
INSERT INTO lga VALUES("NIGER","Suleja","560");
INSERT INTO lga VALUES("NIGER","Tafa","561");
INSERT INTO lga VALUES("NIGER","Wushishi","562");
INSERT INTO lga VALUES("OGUN","Abeokuta north","563");
INSERT INTO lga VALUES("OGUN","Abeokuta south","564");
INSERT INTO lga VALUES("OGUN","Ado-odo/ota","565");
INSERT INTO lga VALUES("OGUN","Egbado north","566");
INSERT INTO lga VALUES("OGUN","Egbado south","567");
INSERT INTO lga VALUES("OGUN","Ekwekoro","568");
INSERT INTO lga VALUES("OGUN","Ifo","569");
INSERT INTO lga VALUES("OGUN","Ijebu east","570");
INSERT INTO lga VALUES("OGUN","Ijebu north","571");
INSERT INTO lga VALUES("OGUN","Ijebu north east","572");
INSERT INTO lga VALUES("OGUN","Ijebu-ode","573");
INSERT INTO lga VALUES("OGUN","Ikenne","574");
INSERT INTO lga VALUES("OGUN","Imeko-afon","575");
INSERT INTO lga VALUES("OGUN","Ipokia","576");
INSERT INTO lga VALUES("OGUN","Obafemi-owode","577");
INSERT INTO lga VALUES("OGUN","Ogun waterside","578");
INSERT INTO lga VALUES("OGUN","Odeda","579");
INSERT INTO lga VALUES("OGUN","Odogbolu","580");
INSERT INTO lga VALUES("OGUN","Remo north","581");
INSERT INTO lga VALUES("OGUN","Shagamu","582");
INSERT INTO lga VALUES("ONDO","Akoko north east","583");
INSERT INTO lga VALUES("ONDO","Akoko north west","584");
INSERT INTO lga VALUES("ONDO","Akoko south east","585");
INSERT INTO lga VALUES("ONDO","Akoko south west","586");
INSERT INTO lga VALUES("ONDO","Akure north","587");
INSERT INTO lga VALUES("ONDO","Ese-odo","589");
INSERT INTO lga VALUES("ONDO","Idanre","590");
INSERT INTO lga VALUES("ONDO","Ifedore","591");
INSERT INTO lga VALUES("ONDO","Ilaje","592");
INSERT INTO lga VALUES("ONDO","Ile-oluji-okeigbo","593");
INSERT INTO lga VALUES("ONDO","Irele","594");
INSERT INTO lga VALUES("ONDO","Odigbo","595");
INSERT INTO lga VALUES("ONDO","Okitipupa","596");
INSERT INTO lga VALUES("ONDO","Ondo east","597");
INSERT INTO lga VALUES("ONDO","Ondo west","598");
INSERT INTO lga VALUES("ONDO","Ose-owo","599");
INSERT INTO lga VALUES("OSUN","Aiyedade","600");
INSERT INTO lga VALUES("OSUN","Aiyedire","601");
INSERT INTO lga VALUES("OSUN","Atakumosa east","602");
INSERT INTO lga VALUES("OSUN","Atakumose-west","603");
INSERT INTO lga VALUES("OSUN","Boluwaduro","604");
INSERT INTO lga VALUES("OSUN","Boripe","605");
INSERT INTO lga VALUES("OSUN","Ede north","606");
INSERT INTO lga VALUES("OSUN","Ede south","607");
INSERT INTO lga VALUES("OSUN","Egbedore","608");
INSERT INTO lga VALUES("OSUN","Ejigbo","609");
INSERT INTO lga VALUES("OSUN","Ife central","610");
INSERT INTO lga VALUES("OSUN","Ife east","611");
INSERT INTO lga VALUES("OSUN","Ife north","612");
INSERT INTO lga VALUES("OSUN","Ife south","613");
INSERT INTO lga VALUES("OSUN","Ifedayo","614");
INSERT INTO lga VALUES("OSUN","Ifelodun","615");
INSERT INTO lga VALUES("OSUN","Ila","616");
INSERT INTO lga VALUES("OSUN","Ilasha east","617");
INSERT INTO lga VALUES("OSUN","Ilesha west","618");
INSERT INTO lga VALUES("OSUN","Irepodun","619");
INSERT INTO lga VALUES("OSUN","Irewole","620");
INSERT INTO lga VALUES("OSUN","Isokan","621");
INSERT INTO lga VALUES("OSUN","Iwo","622");
INSERT INTO lga VALUES("OSUN","Obokun","623");
INSERT INTO lga VALUES("OSUN","Odo-otin","624");
INSERT INTO lga VALUES("OSUN","Ola-oluwa","625");
INSERT INTO lga VALUES("OSUN","Olorunda","626");
INSERT INTO lga VALUES("OSUN","Oriade","627");
INSERT INTO lga VALUES("OSUN","Orolu","628");
INSERT INTO lga VALUES("OSUN","Osogbo","629");
INSERT INTO lga VALUES("OYO","Afijio","630");
INSERT INTO lga VALUES("OYO","Akinyele","631");
INSERT INTO lga VALUES("OYO","Atiba","632");
INSERT INTO lga VALUES("OYO","Atigbo","633");
INSERT INTO lga VALUES("OYO","Egbeda","634");
INSERT INTO lga VALUES("OYO","Ibadan central","635");
INSERT INTO lga VALUES("OYO","Ibadan north","636");
INSERT INTO lga VALUES("OYO","Ibadan north west","637");
INSERT INTO lga VALUES("OYO","Ibadan south west","638");
INSERT INTO lga VALUES("OYO","Ibadan south east","639");
INSERT INTO lga VALUES("OYO","Ibarapa central","640");
INSERT INTO lga VALUES("OYO","Ibarapa east","641");
INSERT INTO lga VALUES("OYO","Ibarapa north","642");
INSERT INTO lga VALUES("OYO","Ido","643");
INSERT INTO lga VALUES("OYO","Irepo","644");
INSERT INTO lga VALUES("OYO","Iseyin","645");
INSERT INTO lga VALUES("OYO","Itesiwaju","646");
INSERT INTO lga VALUES("OYO","Iwajowa","647");
INSERT INTO lga VALUES("OYO","Kajola","648");
INSERT INTO lga VALUES("OYO","Lagelu","649");
INSERT INTO lga VALUES("OYO","Ogbomoso north","650");
INSERT INTO lga VALUES("OYO","Ogbomoso south","651");
INSERT INTO lga VALUES("OYO","Ogo oluwa","652");
INSERT INTO lga VALUES("OYO","Olorunsogo","653");
INSERT INTO lga VALUES("OYO","Oluyole","654");
INSERT INTO lga VALUES("OYO","Ona-ara","655");
INSERT INTO lga VALUES("OYO","Orelope","656");
INSERT INTO lga VALUES("OYO","Ori ire","657");
INSERT INTO lga VALUES("OYO","Oyo east","658");
INSERT INTO lga VALUES("OYO","Oyo west","659");
INSERT INTO lga VALUES("OYO","Saki east","660");
INSERT INTO lga VALUES("OYO","Saki west","661");
INSERT INTO lga VALUES("OYO","Surelere","662");
INSERT INTO lga VALUES("PLATEAU","Barikin ladi","663");
INSERT INTO lga VALUES("PLATEAU","Bassa","664");
INSERT INTO lga VALUES("PLATEAU","Bokkos","665");
INSERT INTO lga VALUES("PLATEAU","Jos east","666");
INSERT INTO lga VALUES("PLATEAU","Jos north","667");
INSERT INTO lga VALUES("PLATEAU","Jos south","668");
INSERT INTO lga VALUES("PLATEAU","Kanam","669");
INSERT INTO lga VALUES("PLATEAU","Kanke","670");
INSERT INTO lga VALUES("PLATEAU","Langtang north","671");
INSERT INTO lga VALUES("PLATEAU","Langtang south","672");
INSERT INTO lga VALUES("PLATEAU","Mangu","673");
INSERT INTO lga VALUES("PLATEAU","Mikang","674");
INSERT INTO lga VALUES("PLATEAU","Pankshin","675");
INSERT INTO lga VALUES("PLATEAU","Qua\'an pan","676");
INSERT INTO lga VALUES("PLATEAU","Riyom","677");
INSERT INTO lga VALUES("PLATEAU","Shendam","678");
INSERT INTO lga VALUES("PLATEAU","Wase","679");
INSERT INTO lga VALUES("RIVERS","Abua/odual","680");
INSERT INTO lga VALUES("RIVERS","Ahoada east","681");
INSERT INTO lga VALUES("RIVERS","Ahoada west","682");
INSERT INTO lga VALUES("RIVERS","Akuku toru","683");
INSERT INTO lga VALUES("RIVERS","Andoni","684");
INSERT INTO lga VALUES("RIVERS","Asari-toru","685");
INSERT INTO lga VALUES("RIVERS","Bonny","686");
INSERT INTO lga VALUES("RIVERS","Degema","687");
INSERT INTO lga VALUES("RIVERS","Emohua","688");
INSERT INTO lga VALUES("RIVERS","Eleme","689");
INSERT INTO lga VALUES("RIVERS","Etche","690");
INSERT INTO lga VALUES("RIVERS","Gokana","691");
INSERT INTO lga VALUES("RIVERS","Ikwerre","692");
INSERT INTO lga VALUES("RIVERS","Khana","693");
INSERT INTO lga VALUES("RIVERS","Obia/akpor","694");
INSERT INTO lga VALUES("RIVERS","Ogba/egbema/ndoni","695");
INSERT INTO lga VALUES("RIVERS","Ogu/bolo","696");
INSERT INTO lga VALUES("RIVERS","Okrika","697");
INSERT INTO lga VALUES("RIVERS","Omumma","698");
INSERT INTO lga VALUES("RIVERS","Opobo/nkoro","699");
INSERT INTO lga VALUES("RIVERS","Oyigbo","700");
INSERT INTO lga VALUES("RIVERS","Port harcourt","701");
INSERT INTO lga VALUES("RIVERS","Tai","702");
INSERT INTO lga VALUES("SOKOTO","Binji","703");
INSERT INTO lga VALUES("SOKOTO","Bodinga","704");
INSERT INTO lga VALUES("SOKOTO","Dange-shuni","705");
INSERT INTO lga VALUES("SOKOTO","Gada","706");
INSERT INTO lga VALUES("SOKOTO","Goronyo","707");
INSERT INTO lga VALUES("SOKOTO","Gudu","708");
INSERT INTO lga VALUES("SOKOTO","Gwadabawa","709");
INSERT INTO lga VALUES("SOKOTO","Illela","710");
INSERT INTO lga VALUES("SOKOTO","Isa","711");
INSERT INTO lga VALUES("SOKOTO","Kware","712");
INSERT INTO lga VALUES("SOKOTO","Kebbe","713");
INSERT INTO lga VALUES("SOKOTO","Rabah","714");
INSERT INTO lga VALUES("SOKOTO","Sabon birni","715");
INSERT INTO lga VALUES("SOKOTO","Shagari","716");
INSERT INTO lga VALUES("SOKOTO","Silame","717");
INSERT INTO lga VALUES("SOKOTO","Sokoto north","718");
INSERT INTO lga VALUES("SOKOTO","Sokoto south","719");
INSERT INTO lga VALUES("SOKOTO","Tambuwal","720");
INSERT INTO lga VALUES("SOKOTO","Tangaza","721");
INSERT INTO lga VALUES("SOKOTO","Tureta","722");
INSERT INTO lga VALUES("SOKOTO","Wamakko","723");
INSERT INTO lga VALUES("SOKOTO","Wurno","724");
INSERT INTO lga VALUES("SOKOTO","Yabo","725");
INSERT INTO lga VALUES("TARABA","Ardo-kola","726");
INSERT INTO lga VALUES("TARABA","Bali","727");
INSERT INTO lga VALUES("TARABA","Donga","728");
INSERT INTO lga VALUES("TARABA","Gashaka","729");
INSERT INTO lga VALUES("TARABA","Gassol","730");
INSERT INTO lga VALUES("TARABA","Ibi","731");
INSERT INTO lga VALUES("TARABA","Jalingo","732");
INSERT INTO lga VALUES("TARABA","Karim-lamido","733");
INSERT INTO lga VALUES("TARABA","Kurmi","734");
INSERT INTO lga VALUES("TARABA","Lau","735");
INSERT INTO lga VALUES("TARABA","Sarduana","736");
INSERT INTO lga VALUES("TARABA","Takum","737");
INSERT INTO lga VALUES("TARABA","Ussa","738");
INSERT INTO lga VALUES("TARABA","Wukari","739");
INSERT INTO lga VALUES("TARABA","Yorro","740");
INSERT INTO lga VALUES("TARABA","Zing","741");
INSERT INTO lga VALUES("YOBE","Bade","742");
INSERT INTO lga VALUES("YOBE","Bursari","743");
INSERT INTO lga VALUES("YOBE","Damaturu","744");
INSERT INTO lga VALUES("YOBE","Fika","745");
INSERT INTO lga VALUES("YOBE","Fune","746");
INSERT INTO lga VALUES("YOBE","Geidam","747");
INSERT INTO lga VALUES("YOBE","Gujba","748");
INSERT INTO lga VALUES("YOBE","Gulani","749");
INSERT INTO lga VALUES("YOBE","Jakusko","750");
INSERT INTO lga VALUES("YOBE","Karasuwa","751");
INSERT INTO lga VALUES("YOBE","Machina","752");
INSERT INTO lga VALUES("YOBE","Nangere","753");
INSERT INTO lga VALUES("YOBE","Nguru","754");
INSERT INTO lga VALUES("YOBE","Potiskum","755");
INSERT INTO lga VALUES("YOBE","Tarmua","756");
INSERT INTO lga VALUES("YOBE","Yunusari","757");
INSERT INTO lga VALUES("YOBE","Yusufari","758");
INSERT INTO lga VALUES("ZAMFARA","Anka","759");
INSERT INTO lga VALUES("ZAMFARA","Bakurna","760");
INSERT INTO lga VALUES("ZAMFARA","Birnin magaji","761");
INSERT INTO lga VALUES("ZAMFARA","Bukkuyum","762");
INSERT INTO lga VALUES("ZAMFARA","Bungudu","763");
INSERT INTO lga VALUES("ZAMFARA","Gummi","764");
INSERT INTO lga VALUES("ZAMFARA","Kaura namoda","765");
INSERT INTO lga VALUES("ZAMFARA","Maradun","766");
INSERT INTO lga VALUES("ZAMFARA","Maru","767");
INSERT INTO lga VALUES("ZAMFARA","Shinkafi","768");
INSERT INTO lga VALUES("ZAMFARA","Talata","769");
INSERT INTO lga VALUES("ZAMFARA","Mafara","770");
INSERT INTO lga VALUES("ZAMFARA","Tsafe","771");
INSERT INTO lga VALUES("ZAMFARA","Zumi","772");
INSERT INTO lga VALUES("NASARAWA","Eggon","773");
INSERT INTO lga VALUES("ONDO","Ile oluji","774");
INSERT INTO lga VALUES("OGUN","Sagamu","775");
INSERT INTO lga VALUES("OGUN","Opeji","776");
INSERT INTO lga VALUES("OGUN","Ijebu ode","777");
INSERT INTO lga VALUES("EDO","Ishan","778");
INSERT INTO lga VALUES("ONDO","Ondo central","779");
INSERT INTO lga VALUES("BENUE","Otukpo","780");
INSERT INTO lga VALUES("ABUJA","Abaji","781");
INSERT INTO lga VALUES("ABUJA","Abuja muni.","782");
INSERT INTO lga VALUES("ABUJA","Bwari","783");
INSERT INTO lga VALUES("ABUJA","Gwagwalada","784");
INSERT INTO lga VALUES("ABUJA","Kuje","785");
INSERT INTO lga VALUES("ABUJA","Kwali","786");
INSERT INTO lga VALUES("IMO","Ehime mbano","787");
INSERT INTO lga VALUES("ENUGU","Oji river","788");
INSERT INTO lga VALUES("OYO","Ogbomosho","789");
INSERT INTO lga VALUES("ONDO","Akure south","790");
INSERT INTO lga VALUES("CROSS RIVER","Odupani","791");
INSERT INTO lga VALUES("IMO","Ngor okpala","792");
INSERT INTO lga VALUES("BENUE","Ador","793");
INSERT INTO lga VALUES("AKWA IBOM","Okobo","794");
INSERT INTO lga VALUES("KOGI","Idah","795");
INSERT INTO lga VALUES("ABIA","Ugwunagbor","796");
INSERT INTO lga VALUES("RIVERS","Ogba/Egbem/Noom","797");
INSERT INTO lga VALUES("KOGI","Okene","798");
INSERT INTO lga VALUES("ONDO","Akoko","799");
INSERT INTO lga VALUES("ONDO","Owo","800");
INSERT INTO lga VALUES("KEBBI","Kamba","801");
INSERT INTO lga VALUES("OGUN","Water side","802");
INSERT INTO lga VALUES("OGUN","Egado South","803");
INSERT INTO lga VALUES("OGUN","Imeko Afon","804");
INSERT INTO lga VALUES("PLATEAU","Panilshin","805");
INSERT INTO lga VALUES("ONDO","Ikalo","806");
INSERT INTO lga VALUES("LAGOS","Eredo","807");
INSERT INTO lga VALUES("KATSINA","Manufanoti","808");
INSERT INTO lga VALUES("SOKOTO","Kofa atiku","809");
INSERT INTO lga VALUES("AKWA IBOM","Onna","811");
INSERT INTO lga VALUES("AKWA IBOM","Udium","812");
INSERT INTO lga VALUES("OGUN","Ake","813");
INSERT INTO lga VALUES("EDO","Uromi","814");
INSERT INTO lga VALUES("AKWA IBOM","Oron","815");
INSERT INTO lga VALUES("AKWA IBOM","Oruk","816");
INSERT INTO lga VALUES("DELTA","Aniocha","817");
INSERT INTO lga VALUES("ONDO","Ose","818");
INSERT INTO lga VALUES("KWARA","Oro","819");
INSERT INTO lga VALUES("OGUN","Yewa","820");
INSERT INTO lga VALUES("OGUN","Yewa South","821");
INSERT INTO lga VALUES("OGUN","Yewa North","822");
INSERT INTO lga VALUES("RIVERS","Opobo/Nkoro","823");
INSERT INTO lga VALUES("RIVERS","Onelga","824");


DROP TABLE IF EXISTS loan application;

;

INSERT INTO loan application VALUES("1","1000.000","0.000","1000.000","1","100","10000.00","High","Pending","Esusu - Sunday","10","5.00","Simple Interest","Daily","10","2018-04-24","2019-02-24","1050.00","0.00","10500.00","","","ADMIN","1.00","","","0.00","","","","0.00","0.00","10000.00","0.00","0.00","0.00","500.00","50.00","1000.00","","","Pending","");


DROP TABLE IF EXISTS loan guarantor;

;

INSERT INTO loan guarantor VALUES("1","1000.000","0.000","1000.000","1","100","10000.00","High","Pending","Esusu - Sunday","10","5.00","Simple Interest","Daily","10","2018-04-24","2019-02-24","1050.00","0.00","10500.00","","","ADMIN","1.00","","","0.00","","","","0.00","0.00","10000.00","0.00","0.00","0.00","500.00","50.00","1000.00","","","Pending","");


DROP TABLE IF EXISTS loan payment;

;

INSERT INTO loan payment VALUES("1","1000.000","0.000","1000.000","1","100","10000.00","High","Pending","Esusu - Sunday","10","5.00","Simple Interest","Daily","10","2018-04-24","2019-02-24","1050.00","0.00","10500.00","","","ADMIN","1.00","","","0.00","","","","0.00","0.00","10000.00","0.00","0.00","0.00","500.00","50.00","1000.00","","","Pending","");


DROP TABLE IF EXISTS loan type;

;

INSERT INTO loan type VALUES("1","1000.000","0.000","1000.000","1","100","10000.00","High","Pending","Esusu - Sunday","10","5.00","Simple Interest","Daily","10","2018-04-24","2019-02-24","1050.00","0.00","10500.00","","","ADMIN","1.00","","","0.00","","","","0.00","0.00","10000.00","0.00","0.00","0.00","500.00","50.00","1000.00","","","Pending","");


DROP TABLE IF EXISTS loan;

CREATE TABLE `loan` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Application Fee` decimal(11,3) default NULL,
  `Processing Fee` decimal(11,3) default NULL,
  `Insurance Fee` decimal(11,3) default NULL,
  `Loan Account` varchar(50) default NULL,
  `Account Number` varchar(50) default NULL,
  `Loan Amount` decimal(13,2) default NULL,
  `Loan Grade` varchar(50) default NULL,
  `Loan Status` varchar(50) default NULL,
  `Loan Type` varchar(50) default NULL,
  `Loan Duration` int(11) default NULL,
  `Interest Rate` decimal(10,2) default NULL,
  `Payment Type` varchar(50) default NULL,
  `Payment Frequency` varchar(50) default NULL,
  `No of Payment` int(11) default NULL,
  `Loan Date` date default NULL,
  `Due Date` date default NULL,
  `Periodic Repayment` decimal(13,2) default NULL,
  `Payment todate` decimal(13,2) default NULL,
  `Balance` decimal(13,2) default NULL,
  `Purpose` text,
  `Guarantor` varchar(100) default NULL,
  `Officer` varchar(50) default NULL,
  `Late Charge` decimal(13,2) default NULL,
  `Collateral` varchar(100) default NULL,
  `Collateral Location` varchar(60) default NULL,
  `Collateral Value` decimal(13,2) default NULL,
  `Collateral Title` varchar(50) default NULL,
  `Collateral Description` text,
  `Loan No` varchar(50) default NULL,
  `Interest toDate` decimal(11,2) default NULL,
  `PPayment todate` decimal(11,2) default NULL,
  `PBalance` decimal(11,2) default NULL,
  `Daily Interest` decimal(11,2) default NULL,
  `Daily Principal` decimal(11,2) default NULL,
  `Daily Repay` decimal(11,2) default NULL,
  `Total Interest` decimal(11,2) default NULL,
  `Monthly Interest` decimal(11,2) default NULL,
  `Monthly Principal` decimal(11,2) default NULL,
  `Guarantor Contact` varchar(50) default NULL,
  `Guarantor Occupation` varchar(50) default NULL,
  `Approval` varchar(50) default 'Pending',
  `Approval Note` text,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO loan VALUES("1","1000.000","0.000","1000.000","1","100","10000.00","High","Pending","Esusu - Sunday","10","5.00","Simple Interest","Daily","10","2018-04-24","2019-02-24","1050.00","0.00","10500.00","","","ADMIN","1.00","","","0.00","","","","0.00","0.00","10000.00","0.00","0.00","0.00","500.00","50.00","1000.00","","","Pending","");


DROP TABLE IF EXISTS location;

CREATE TABLE `location` (
  `Location_id` int(11) NOT NULL auto_increment,
  `Location` varchar(50) default NULL,
  PRIMARY KEY  (`Location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO location VALUES("1","Abuja");
INSERT INTO location VALUES("34","Lagos/Shomolu");


DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `username` varchar(100) NOT NULL default '',
  `access_lvl` bigint(11) NOT NULL default '1',
  `Firstname` varchar(50) default NULL,
  `Surname` varchar(50) default NULL,
  `Address` varchar(250) default NULL,
  `City` varchar(50) default NULL,
  `State` varchar(50) default NULL,
  `Nationality` varchar(50) default NULL,
  `Postal Code` varchar(50) default NULL,
  `Phone` varchar(50) default NULL,
  `Fax` varchar(50) default NULL,
  `DoB_Day` int(4) default NULL,
  `DoB_Month` varchar(20) default NULL,
  `DoB_Year` int(4) default NULL,
  `Reg Number` varchar(50) default NULL,
  `Sponsor` varchar(50) default NULL,
  `Bank` varchar(50) default NULL,
  `Account` varchar(50) default NULL,
  `Reg Date` timestamp NULL default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("78","info@waltergates.com","098f6bcd4621d373cade4e832627b4f6","admin","5","","","","","","","","","","","","","","","","","");
INSERT INTO login VALUES("70","admin@ncs.com","21232f297a57a5a743894a0e4a801fc3","admin","5","","","","","","","","","","","","","","","","","2011-03-15 01:06:34");
INSERT INTO login VALUES("82","info@waltergates.com","21232f297a57a5a743894a0e4a801fc3","admin","5","","","","","","","","","","","","","","","","","");


DROP TABLE IF EXISTS monitor;

CREATE TABLE `monitor` (
  `User Category` varchar(50) default NULL,
  `User Name` varchar(50) default NULL,
  `Date Logged On` date default NULL,
  `File Used` varchar(200) default NULL,
  `Details` varchar(200) default NULL,
  `Time Logged On` time default NULL,
  `ip` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO monitor VALUES("Administrator","Admin","2018-04-24","Customer Record","Added Customer Record for: 100, tester","05:25:00","");


DROP TABLE IF EXISTS mtracker;

CREATE TABLE `mtracker` (
  `ID` bigint(11) NOT NULL,
  `Month` varchar(50) default NULL,
  `Date` date default NULL,
  `Done` tinyint(1) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mtracker VALUES("0","September","2015-09-01","1");
INSERT INTO mtracker VALUES("0","May","2018-05-01","1");


DROP TABLE IF EXISTS narration;

CREATE TABLE `narration` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Narration` varchar(50) default NULL,
  `Type` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO narration VALUES("1","Passbook","Income");
INSERT INTO narration VALUES("2","Check Book","Income");
INSERT INTO narration VALUES("3","Loan Application Form","Income");
INSERT INTO narration VALUES("4","Lease Application Form","Income");
INSERT INTO narration VALUES("5","Loan Processing Fee","Income");
INSERT INTO narration VALUES("6","Loan Commitment Fee","Income");
INSERT INTO narration VALUES("7","Lease Processing Fee","Income");
INSERT INTO narration VALUES("8","Interest ","Income");
INSERT INTO narration VALUES("9","Late Charges","Income");
INSERT INTO narration VALUES("10","Contribution Charges","Income");


DROP TABLE IF EXISTS nationality;

CREATE TABLE `nationality` (
  `Nat_ID` int(11) default NULL,
  `Nationality` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO nationality VALUES("1","Nigeria");
INSERT INTO nationality VALUES("2","Ghana");
INSERT INTO nationality VALUES("3","Cameroon");
INSERT INTO nationality VALUES("4","Argentina");
INSERT INTO nationality VALUES("5","Australia");
INSERT INTO nationality VALUES("6","Belgium");
INSERT INTO nationality VALUES("7","Brazil");
INSERT INTO nationality VALUES("8","Canada");
INSERT INTO nationality VALUES("9","Chile");
INSERT INTO nationality VALUES("10","China");
INSERT INTO nationality VALUES("11","Columbia");
INSERT INTO nationality VALUES("12","Costa Rica");
INSERT INTO nationality VALUES("13","Denmark");
INSERT INTO nationality VALUES("14","Egypt");
INSERT INTO nationality VALUES("15","Finland");
INSERT INTO nationality VALUES("16","France");
INSERT INTO nationality VALUES("17","Germany");
INSERT INTO nationality VALUES("18","Greece");
INSERT INTO nationality VALUES("19","Hong Kong");
INSERT INTO nationality VALUES("20","India");
INSERT INTO nationality VALUES("21","Indonesia");
INSERT INTO nationality VALUES("22","Iran");
INSERT INTO nationality VALUES("23","Ireland");
INSERT INTO nationality VALUES("24","Israel");
INSERT INTO nationality VALUES("25","Italy");
INSERT INTO nationality VALUES("26","Japan");
INSERT INTO nationality VALUES("27","Korea (South)");
INSERT INTO nationality VALUES("28","Malaysia");
INSERT INTO nationality VALUES("29","Mexico");
INSERT INTO nationality VALUES("30","Netherlands");
INSERT INTO nationality VALUES("31","New Zealand");
INSERT INTO nationality VALUES("32","Norway");
INSERT INTO nationality VALUES("33","Pakistan");
INSERT INTO nationality VALUES("34","Paraguay");
INSERT INTO nationality VALUES("35","Peru");
INSERT INTO nationality VALUES("36","Philippines");
INSERT INTO nationality VALUES("37","Poland");
INSERT INTO nationality VALUES("38","Portugal");
INSERT INTO nationality VALUES("39","Russia");
INSERT INTO nationality VALUES("40","Saudi Arabia");
INSERT INTO nationality VALUES("41","Singapore");
INSERT INTO nationality VALUES("42","South Africa");
INSERT INTO nationality VALUES("43","Spain");
INSERT INTO nationality VALUES("44","Sweden");
INSERT INTO nationality VALUES("45","Switzerland");
INSERT INTO nationality VALUES("46","Taiwan");
INSERT INTO nationality VALUES("47","Turkey");
INSERT INTO nationality VALUES("48","United Arab Emirate");
INSERT INTO nationality VALUES("49","Uruguay");
INSERT INTO nationality VALUES("50","Great Britain");
INSERT INTO nationality VALUES("51","USA");
INSERT INTO nationality VALUES("52","Venezuela");
INSERT INTO nationality VALUES("53","Zimbabwe");


DROP TABLE IF EXISTS overages;

CREATE TABLE `overages` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Date` date default NULL,
  `Amount` decimal(13,2) default NULL,
  `Source` varchar(50) default NULL,
  `Note` text,
  `Officer` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS reg fees;

;



DROP TABLE IF EXISTS remitance;

CREATE TABLE `remitance` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Bank Remitance` decimal(13,2) default NULL,
  `CBN Remitance` decimal(13,2) default NULL,
  `Bank Confirm` tinyint(1) default NULL,
  `CBN Confirm` tinyint(1) default NULL,
  `Bank Date` varchar(25) default NULL,
  `CBN Date` varchar(25) default NULL,
  `Bank` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO remitance VALUES("1","500.00","","1","","2010/01/25","","UBA");


DROP TABLE IF EXISTS revenue;

CREATE TABLE `revenue` (
  `ID` bigint(11) NOT NULL auto_increment,
  `DoB_Day` int(4) default NULL,
  `Amount` decimal(13,2) default NULL,
  `Paid` tinyint(1) default NULL,
  `Command` varchar(50) default NULL,
  `Bank` varchar(50) default NULL,
  `Location` varchar(50) default NULL,
  `Amount Remitted` decimal(13,2) default NULL,
  `Confirmed` tinyint(1) default NULL,
  `DoB_Month` varchar(15) default NULL,
  `DoB_Year` int(4) default NULL,
  `Date Remitted` varchar(12) default NULL,
  `Pending` decimal(13,2) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO revenue VALUES("1","25","500000.00","","Apapa","UBA","Lagos","500000.00","1","Jan","2010","2010/01/25","0.00");


DROP TABLE IF EXISTS sms tarrif;

;



DROP TABLE IF EXISTS state;

CREATE TABLE `state` (
  `State` varchar(50) default NULL,
  `Nation` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO state VALUES("FCT-Abuja","Nigeria");
INSERT INTO state VALUES("Abia","Nigeria");
INSERT INTO state VALUES("Adamawa","Nigeria");
INSERT INTO state VALUES("Akwa Ibom","Nigeria");
INSERT INTO state VALUES("Anambra","Nigeria");
INSERT INTO state VALUES("Bauchi","Nigeria");
INSERT INTO state VALUES("Bayelsa","Nigeria");
INSERT INTO state VALUES("Benue","Nigeria");
INSERT INTO state VALUES("Borno","Nigeria");
INSERT INTO state VALUES("Cross River","Nigeria");
INSERT INTO state VALUES("Delta","Nigeria");
INSERT INTO state VALUES("Ebonyi","Nigeria");
INSERT INTO state VALUES("Edo","Nigeria");
INSERT INTO state VALUES("Ekiti","Nigeria");
INSERT INTO state VALUES("Gombe","Nigeria");
INSERT INTO state VALUES("Imo","Nigeria");
INSERT INTO state VALUES("Jigawa","Nigeria");
INSERT INTO state VALUES("Kaduna","Nigeria");
INSERT INTO state VALUES("Kano","Nigeria");
INSERT INTO state VALUES("Katsina","Nigeria");
INSERT INTO state VALUES("Kebbi","Nigeria");
INSERT INTO state VALUES("Kogi","Nigeria");
INSERT INTO state VALUES("Kwara","Nigeria");
INSERT INTO state VALUES("Lagos","Nigeria");
INSERT INTO state VALUES("Nassarawa","Nigeria");
INSERT INTO state VALUES("Niger","Nigeria");
INSERT INTO state VALUES("Ogun","Nigeria");
INSERT INTO state VALUES("Ondo","Nigeria");
INSERT INTO state VALUES("Osun","Nigeria");
INSERT INTO state VALUES("Oyo","Nigeria");
INSERT INTO state VALUES("Plateau","Nigeria");
INSERT INTO state VALUES("Rivers","Nigeria");
INSERT INTO state VALUES("Sokoto","Nigeria");
INSERT INTO state VALUES("Taraba","Nigeria");
INSERT INTO state VALUES("Yobe","Nigeria");
INSERT INTO state VALUES("Zamfara","Nigeria");
INSERT INTO state VALUES("Enugu","");
INSERT INTO state VALUES("AAA","");


DROP TABLE IF EXISTS sundry;

CREATE TABLE `sundry` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Date` date default NULL,
  `Amount` decimal(13,2) default NULL,
  `Source` varchar(50) default NULL,
  `Note` text,
  `Officer` varchar(50) default NULL,
  `Account Number` varchar(50) default NULL,
  `Type` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS transactions;

CREATE TABLE `transactions` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Date` date default NULL,
  `Deposit` decimal(13,2) default NULL,
  `Withdrawal` decimal(13,2) default NULL,
  `Balance` decimal(13,2) default '0.00',
  `Transactor` varchar(50) default NULL,
  `Transactor Contact` varchar(50) default NULL,
  `Transactor ID Type` varchar(50) default NULL,
  `Transactor ID Number` varchar(50) default NULL,
  `Officer` varchar(50) default NULL,
  `Remark` varchar(200) default NULL,
  `Cheque No` varchar(50) default NULL,
  `Account Number` varchar(50) default NULL,
  `Transaction Type` varchar(50) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS treasury;

CREATE TABLE `treasury` (
  `ID` bigint(11) NOT NULL auto_increment,
  `Date` date default NULL,
  `Note` varchar(50) default NULL,
  `Amount` decimal(13,2) default NULL,
  `Given To` varchar(50) default NULL,
  `Given By` varchar(50) default NULL,
  `Direction` varchar(20) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO treasury VALUES("2","2012-02-03","GHc20","200.00","gtbank","Admin","In");
INSERT INTO treasury VALUES("3","2018-02-03","N500","200.00","cashier","Admin","Out");


