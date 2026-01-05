<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inspira OOTD Microservice</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f9; color: #333; margin: 0; padding: 20px; display: flex; justify-content: center; }
        .container { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 5px solid #ff69b4; max-width: 600px; width: 100%; }
        h1 { color: #ff69b4; margin-bottom: 0; }
        .status { display: inline-block; background: #e7f9ed; color: #2ecc71; padding: 5px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: bold; margin: 10px 0 20px; }
        .step-box { background: #f8f9fa; border-left: 4px solid #ff69b4; padding: 15px; margin-bottom: 15px; text-align: left; }
        .step-title { font-weight: bold; color: #555; display: block; margin-bottom: 5px; }
        code { background: #eee; padding: 2px 5px; border-radius: 4px; font-family: monospace; font-size: 0.9rem; }
        .footer { font-size: 0.75rem; color: #999; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inspira OOTD System</h1>
        <div class="status">● Microservice Online - v1.0</div>
        
        <p>Gunakan panduan di bawah ini untuk menguji layanan API:</p>

        <div class="step-box">
            <span class="step-title">Step 1: Lihat Koleksi (Public)</span>
            Akses link <code>/api/looks</code> untuk melihat data OOTD.
        </div>

        <div class="step-box">
            <span class="step-title">Step 2: Registrasi & Login (Auth)</span>
            Gunakan Postman untuk <code>POST</code> ke <code>/api/register</code> lalu <code>/api/login</code> untuk mendapatkan <b>Token</b>.
        </div>

        <div class="step-box">
            <span class="step-title">Step 3: Akses Fitur Terkunci (Authorization)</span>
            Gunakan Token tersebut pada <b>Header Authorization</b> untuk mengakses <code>POST /api/boards/1/looks</code>.
        </div>

        <div class="footer">
            Developed on STB Armbian with Docker Isolation | Tugas 2 - Microservices
        </div>
    </div>
</body>
</html>