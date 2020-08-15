use webike;

SET SQL_SAFE_UPDATES = 0;

-- update data for testing model_kana_prefix
-- update mst_model_v2 set model_kana_prefix = ''
-- where model_kana_prefix = 'ナ'
-- order by model_kana_prefix;

-- update data for testing model_displacement
update mst_model_v2 set model_displacement = 370
where model_displacement > 751 and model_displacement <= 1000