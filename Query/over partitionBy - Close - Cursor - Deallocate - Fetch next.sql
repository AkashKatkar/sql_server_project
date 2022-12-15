SELECT * FROM employee 

SELECT emp_id, emp_name, gender, 
       COUNT(gender) OVER (PARTITION BY gender) AS gender_count
FROM employee


DECLARE Employee_Cursor CURSOR FOR
SELECT emp_id, emp_name FROM employee;
OPEN Employee_Cursor;
FETCH NEXT FROM Employee_Cursor;
WHILE @@FETCH_STATUS = 0
   BEGIN
      FETCH NEXT FROM Employee_Cursor;
   END;
CLOSE Employee_Cursor;
DEALLOCATE Employee_Cursor;
GO