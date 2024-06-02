create or replace package c_pack AS
	-- add
	procedure addCustomer(
			c_ID customers.ID%type,
			c_NAME customers.NAME%type,
			c_AGE customers.AGE%type,
			c_ADDRESS customers.ADDRESS%type,
			c_SALARY customers.SALARY%type
		);

	-- remove
	procedure delCustomer(c_id customers.ID%type);

	-- list 
	procedure listCustomers;
end c_pack;
/


create or replace package body c_pack AS

		-- add
	procedure addCustomer(
			c_ID customers.ID%type,
			c_NAME customers.NAME%type,
			c_AGE customers.AGE%type,
			c_ADDRESS customers.ADDRESS%type,
			c_SALARY customers.SALARY%type
		) IS 
	begin 
		insert into customers(ID, NAME, AGE, ADDRESS, SALARY)
			values (c_ID, c_NAME, c_AGE, c_ADDRESS, c_SALARY);
	end addCustomer;

	-- remove
	procedure delCustomer(c_id customers.id%type) IS
	begin
		delete from customers
		where id = c_id;
	end delCustomer;

	-- list 
	procedure listCustomers IS 
	CURSOR c_cust IS select * from customers;
	counter integer := 0;
	begin
		FOR c_record IN c_cust LOOP
			counter := counter + 1;
			dbms_output.put_line(
				'('||counter||')Name: ' || c_record.NAME ||
				', Age: ' || c_record.AGE ||
				', ADDRESS: ' || c_record.ADDRESS||
				', SALARY: ' || c_record.SALARY ||
				'		----ID: ' || c_record.ID
			);
		end loop;

	EXCEPTION
	    WHEN others THEN
	        dbms_output.put_line('ERROR: '|| SQLERRM);

	end listCustomers;
end c_pack;
/


SET SERVEROUTPUT ON;
begin
	c_pack.listCustomers;
	c_pack.addCustomer(10, 'Mohammed', 20, 'Morocco Fes', 50000);
	c_pack.listCustomers;
	c_pack.delCustomer(11);
	c_pack.listCustomers;

end;
/