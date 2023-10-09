<!DOCTYPE html>
<html>
<head>
    <title>Email Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0;">
    <table align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
        <tr>
            <td>
                <img src="{{ asset('../../assets/images/kuliner.png') }}" class="img-fluid logo-img" alt="Logo" style="display: block; width: 200px; margin: 0 auto;">
            </td>
        </tr>
        <tr>
            <td style="padding-top: 20px;">
                <h2 style="font-size: 24px;">Akun Anda GAGAL dibuat!</h2>
                <p style="margin-bottom: 20px;">Maaf akun anda tidak berhasil di konfirmasi<a href="{{ route('user.index') }}" style="text-decoration: none; background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 3px;">Disini</a></p>
            </td>
        </tr>
    </table>
</body>
</html>
