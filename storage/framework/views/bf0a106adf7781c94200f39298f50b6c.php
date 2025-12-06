<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Calculator</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      text-align: center;
      margin-top: 100px;
    }
    .input-field {
      margin: 10px;
      padding: 10px;
      width: 200px;
      font-size: 16px;
    }
    .btn {
      padding: 10px 20px;
      background-color: #0b7bea;
      border: none;
      color: white;
      font-size: 16px;
      margin: 5px;
      cursor: pointer;
      border-radius: 5px;
    }
    .btn:hover {
      background-color: #14e59c;
    }
    h1 {
      color: #148772;
    }
  </style>
</head>

<body>
  <div>
    <form action="#">
      <input type="number" class="input-field" id="num1" placeholder="Enter first number">
      <input type="number" class="input-field" id="num2" placeholder="Enter second number"><br>

      <input type="button" class="btn" value="+" onclick="calculate('+')">
      <input type="button" class="btn" value="-" onclick="calculate('-')">
      <input type="button" class="btn" value="×" onclick="calculate('*')">
      <input type="button" class="btn" value="÷" onclick="calculate('/')">
    </form>
  </div>

  <div>
    <h1>Output: <span id="result" style="color: rgb(241, 188, 13)">0</span></h1>
  </div>

  <script>
    function calculate(operator) {
      let num1 = Number(document.getElementById('num1').value);
      let num2 = Number(document.getElementById('num2').value);
      let result;

      if (isNaN(num1) || isNaN(num2)) {
        alert("Please enter valid numbers!");
        return;
      }

      switch (operator) {
        case '+':
          result = num1 + num2;
          break;
        case '-':
          result = num1 - num2;
          break;
        case '*':
          result = num1 * num2;
          break;
        case '/':
          if (num2 === 0) {
            alert("Cannot divide by zero!");
            return;
          }
          result = num1 / num2;
          break;
        default:
          result = "Error";
      }

      document.getElementById('result').innerText = result;
    }
  </script>
</body>
</html><?php /**PATH D:\Laravel-project\john_portfolio\resources\views/welcome.blade.php ENDPATH**/ ?>