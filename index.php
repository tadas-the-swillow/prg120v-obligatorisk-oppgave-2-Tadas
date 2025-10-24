<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>PRG120V - Obligatorisk oppgave 2</title>
</head>
<body style="font-family: Arial, sans-serif; 
             margin: 0; 
             padding: 20px; 
             /* Enkel regnbuebakgrunn som lineær gradient */
             background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet); 
             background-size: 400% 400%;
             animation: rainbow 10s linear infinite;
             ">

  <h1 style="text-align: center; color: #333;">PRG120V - Obligatorisk oppgave 2</h1>

  <ul style="list-style-type: none; padding: 0; max-width: 400px; margin: 30px auto;">
    <li style="margin: 10px 0;">
      <a href="registrer_klasse.php" style="text-decoration: none; display: block; padding: 12px; background-color: #4CAF50; color: white; border-radius: 5px; text-align: center;"
         onmouseover="this.style.backgroundColor='#45a049';" onmouseout="this.style.backgroundColor='#4CAF50';">
         Registrer klasse
      </a>
    </li>
    <li style="margin: 10px 0;">
      <a href="registrer_student.php" style="text-decoration: none; display: block; padding: 12px; background-color: #2196F3; color: white; border-radius: 5px; text-align: center;"
         onmouseover="this.style.backgroundColor='#1e88e5';" onmouseout="this.style.backgroundColor='#2196F3';">
         Registrer student
      </a>
    </li>
    <li style="margin: 10px 0;">
      <a href="vis_klasser.php" style="text-decoration: none; display: block; padding: 12px; background-color: #FF9800; color: white; border-radius: 5px; text-align: center;"
         onmouseover="this.style.backgroundColor='#fb8c00';" onmouseout="this.style.backgroundColor='#FF9800';">
         Vis alle klasser
      </a>
    </li>
    <li style="margin: 10px 0;">
      <a href="vis_studenter.php" style="text-decoration: none; display: block; padding: 12px; background-color: #9C27B0; color: white; border-radius: 5px; text-align: center;"
         onmouseover="this.style.backgroundColor='#8e24aa';" onmouseout="this.style.backgroundColor='#9C27B0';">
         Vis alle studenter
      </a>
    </li>
    <li style="margin: 10px 0;">
      <a href="slett_klasse.php" style="text-decoration: none; display: block; padding: 12px; background-color: #f44336; color: white; border-radius: 5px; text-align: center;"
         onmouseover="this.style.backgroundColor='#e53935';" onmouseout="this.style.backgroundColor='#f44336';">
         Slett klasse
      </a>
    </li>
    <li style="margin: 10px 0;">
      <a href="slett_student.php" style="text-decoration: none; display: block; padding: 12px; background-color: #607D8B; color: white; border-radius: 5px; text-align: center;"
         onmouseover="this.style.backgroundColor='#546e7a';" onmouseout="this.style.backgroundColor='#607D8B';">
         Slett student
      </a>
    </li>
  </ul>

  <!-- Enkel inline keyframes animasjon for regnbuen -->
  <style>
    @keyframes rainbow {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }
  </style>

</body>
</html>