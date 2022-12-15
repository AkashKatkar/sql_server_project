--ALTER TABLE employee ADD emp_dep_id int

SELECT *  FROM employee


-- GROUP BY
SELECT COUNT(emp_id) AS flag_count, flag
FROM employee
GROUP BY flag


-- Having (Always use with group by)
SELECT COUNT(emp_id) AS rows_count, emp_name, emp_salary
FROM employee
GROUP BY emp_name, emp_salary
HAVING emp_salary >= 40000


-- Which department takes the highest salary
SELECT TOP 1 SUM(emp_salary) AS es, emp_dep_id
FROM employee
GROUP BY emp_dep_id
ORDER BY es DESC


-- Where
SELECT SUM(emp_salary) AS rows_count, emp_name
FROM employee
WHERE emp_salary >= 40000
GROUP BY emp_name


-- For Convert & Cast function: 
-- bigint, int, smallint, tinyint, bit, decimal, numeric, money, smallmoney, float, real, datetime, 
-- smalldatetime, char, varchar, text, nchar, nvarchar, ntext, binary, varbinary, or image

-- Convert
SELECT CONVERT(int, 25.95) -- Output: 25
SELECT CONVERT(int, '25.95') -- Error
SELECT CONVERT(int, '25') -- Output: 25
SELECT CONVERT(money, '5,000.146585') -- Output: 5000.1466
SELECT CONVERT(date, getdate()) -- Output: today_date


-- Cast
SELECT CAST(25.65 AS int) -- Output: 25
SELECT CAST('25.95' AS int) -- Error
SELECT CAST('25' AS int) -- Output: 25
SELECT CAST('5,000.146585' AS money) -- Output: 5000.1466
SELECT CAST('2000-09-18' AS datetime)
SELECT CAST(getdate() AS date) -- Output: today_date


-- Format
SELECT FORMAT(getdate(), 'dd-MM-yyyy HH:mm:sd tt')
SELECT FORMAT(getdate(), 'dd-MM-yyyy')
SELECT FORMAT(getdate(), 'hh:mm:sd tt')
SELECT FORMAT(getdate(), 'HH:mm:s')

DECLARE @d DATETIME = getdate();
SELECT FORMAT(@d, 'd', 'en-US') AS 'US English',  
       FORMAT(@d, 'd', 'no') AS 'Norwegian',  
       FORMAT(@d, 'd', 'zu') AS 'Zulu';


-- STRING_AGG
SELECT STRING_AGG(emp_id, ',') AS emp_ids FROM employee
