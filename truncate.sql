
ALTER TABLE `attendence`
ADD FOREIGN KEY (`leavetype_id`)
REFERENCES leavetype(`id`)



SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE TABLE resproject;
TRUNCATE TABLE resprojctfeedback;
TRUNCATE TABLE resprojectamaneties;
TRUNCATE TABLE resprojectcost;
TRUNCATE TABLE resprojectgeolocation;
TRUNCATE TABLE resprojectimage;
TRUNCATE TABLE resprojectproject;
TRUNCATE TABLE resprojectproperty;

SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE TABLE resproperty;
TRUNCATE TABLE respropertyamaneties;
TRUNCATE TABLE respropertycost;
TRUNCATE TABLE respropertyfeedback;
TRUNCATE TABLE respropertygeolocation;
TRUNCATE TABLE respropertyimage;
TRUNCATE TABLE respropertyproject;
TRUNCATE TABLE respropertytype;

SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE TABLE comproject;
TRUNCATE TABLE comprojectamaneties
TRUNCATE TABLE comprojectfeedback
TRUNCATE TABLE comprojectgeolocation
TRUNCATE TABLE comprojectimage
TRUNCATE TABLE comprojectoffice
TRUNCATE TABLE comprojectproject

websitecontent
financial
financialbigcontent