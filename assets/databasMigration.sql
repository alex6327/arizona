-- Reagent_cate_8_prod
INSERT INTO `biocompdb`.`reagent_cate_8_prod` (
`sn`, `csn`, `ssn`, `dsn`, `Cat.No.`, `Product Name`, `Product Type`, `Description`, `Price`, `Quantity`, `Clonality`, `Immunogen`, `Species Reactivity`, `Specificity`, `Formulation`, `Storage`, `Application`, `Application Notes`, `Cellular Localization`, `Relevance`, `Raised In`, `Purity`, `Isotype`, `Storage Buffer`, `Concentration`, `supplier`, `image`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `reference`, `links`, `pdf`, `operator`, `addtime`, `inventory`, `position`, `srcCatNo`, `accNo`, `srcPrice`, `srcQuan`, `MinQuan`, `Notes`)
SELECT 
`sn`, `csn`, `ssn`, `dsn`, `catNo`, `pname`, `ptype`, `description`, `price`, `quantity`, `clone`, `immunogen`, `SpeciesReactivity`, `specificity`, `formulation`, `storage`, `application`, `ApplicationNotes`, `CellularLocalization`, `Relevance`, `RaisedIn`, `Purity`, `Isotype`, `StorageBuffer`, `Concentration`, `supplier`, `image`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `reference`, `links`, `pdf`, `operator`, `addtime`, `inventory`, `position`, `srcCatNo`, `accNo`, `srcPrice`, `srcQuan`, `MinQuan`, `Notes` FROM userdb_35872_2.products;
--Reagent_cate_12_prod
INSERT INTO `biocompdb`.`reagent_cate_12_prod` 
(`sn`, `csn`, `ssn`, `dsn`, `Cat.No.`, `Product Name`, `Form`, `Description`, `Price`, `Quantity`, `Concentration`, `Storage`, `Design`, `Reaction`, `Notes`, `Application`, `supplier`, `image`, `image2`, `image3`, `image4`, `reference`, `links`, `pdf`, `operator`, `addtime`, `inventory`, `position`, `srcCatNo`, `accNo`, `srcPrice`, `srcQuan`, `MinQuan`)
SELECT 
`sn`, `csn`, `ssn`, `dsn`, `catNo`, `pname`, `form`, `description`, `price`, `quantity`, `concentration`, `storage`, `design`, `reaction`, `notes`, `application`, `supplier`, `image`, `image2`, `image3`, `image4`, `reference`, `links`, `pdf`, `operator`, `addtime`, `inventory`, `position`, `srcCatNo`, `accNo`, `srcPrice`, `srcQuan`, `MinQuan` FROM userdb_35872_2.prodpcr;
--Reagent_cate_22_prod
INSERT INTO `biocompdb`.`reagent_cate_22_prod` 
(`sn`, `csn`, `ssn`, `dsn`, `Cat.No.`, `Product Name`, `Price`, `Quantity`, `Description`, `Concentration`, `Grade`, `Source`, `Composition`, `Protocol`, `Storage`, `Application`, `Handling`, `QC`, `Pictures`, `Notes`, `reference`, `inventory`, `position`, `operator`, `addtime`, `supplier`, `srcCatNo`, `srcPrice`, `accNo`, `srcQuan`, `MinQuan`)
SELECT 
`sn`, `csn`, `ssn`, `dsn`, `catNo`, `pname`, `price`, `quantity`, `description`, `concentration`, `grade`, `source`, `composition`, `protocol`, `storage`, `application`, `handling`, `QC`, `pictures`, `notes`, `reference`, `inventory`, `position`, `operator`, `addtime`, `supplier`, `srcCatNo`, `srcPrice`, `accNo`, `srcQuan`, `MinQuan` FROM userdb_35872_2.prodbiochems
INSERT INTO `biocompdb`.`reagent_cate_22_prod` 
( `csn`, `ssn`, `dsn`, `Cat.No.`, `Product Name`, `Price`, `Quantity`, `Description`,  `Protocol`, `Storage`, `Application`, `Handling`, `Pictures`, `Notes`, `reference`, `inventory`, `position`, `operator`, `addtime`, `supplier`, `srcCatNo`, `srcPrice`, `accNo`, `srcQuan`, `MinQuan`)
select
 `csn`, `ssn`, `dsn`, `catNo`, `pname`, `price`, `quantity`, `description`, `protocol`, `storage`, `application`, `handling`, `pictures`, `notes`, `reference`, `inventory`, `position`, `operator`, `addtime`, `supplier`, `srcCatNo`, `srcPrice`, `accNo`, `srcQuan`, `MinQuan` From `userdb_35872_2`.`prodmarkers`;

