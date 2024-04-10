SELECT
	e.ename AS Employee,
	e.empno AS NoEmp,
	m.ename AS Chef,
	m.empno AS NoChef
FROM
	emp e
	LEFT JOIN emp m ON e.mgr = m.empno;