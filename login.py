from http.server import BaseHTTPRequestHandler, HTTPServer
from urllib.parse import parse_qs

# 가상의 사용자 데이터베이스
users = {
    'user1': {'password': 'pass1'},
    'user2': {'password': 'pass2'}
}

class SimpleHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        self.send_response(200)
        self.send_header('Content-type', 'text/html')
        self.end_headers()

        # 로그인 페이지 HTML
        html = """
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>form input</title>
  </head>
  <body>
    <form action="">
      <fieldset>
        <legend>로그인 정보</legend>
        <ul>
          <li>
            <label for="username">Username</label>
            <input type="username" id="username" required />
          </li>
          <li>
            <label for="password">Password</label>
            <input type="password" id="password" required />
          </li>
        </ul>
      </fieldset>
      <input type="submit" value="로그인" />
    </form>
  </body>
</html>
        """
        self.wfile.write(html.encode())

    def do_POST(self):
        content_length = int(self.headers['Content-Length'])
        post_data = self.rfile.read(content_length).decode('utf-8')
        params = parse_qs(post_data)

        username = params['username'][0]
        password = params['password'][0]

        if username in users and users[username]['password'] == password:
            self.send_response(200)
            self.send_header('Content-type', 'text/html')
            self.end_headers()
            self.wfile.write(f'로그인 성공! 환영합니다, {username}님.'.encode())
        else:
            self.send_response(401)
            self.send_header('Content-type', 'text/html')
            self.end_headers()
            self.wfile.write('로그인 실패. 아이디 또는 비밀번호를 확인하세요.'.encode())

if __name__ == '__main__':
    server_address = ('', 8000)
    httpd = HTTPServer(server_address, SimpleHandler)
    print('서버 시작 - http://localhost:8000')
    httpd.serve_forever()