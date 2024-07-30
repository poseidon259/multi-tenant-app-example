FROM postgres:latest

# Cài đặt các gói bổ sung nếu cần
RUN apt-get update && apt-get install -y \
    vim \
    && rm -rf /var/lib/apt/lists/*

# Tùy chỉnh cấu hình PostgreSQL nếu cần
COPY postgresql.conf /etc/postgresql/postgresql.conf

# Thiết lập biến môi trường
ENV POSTGRES_DB=mydb
ENV POSTGRES_USER=myuser
ENV POSTGRES_PASSWORD=mypassword

# Mở cổng 5432
EXPOSE 5432

# Chạy PostgreSQL
CMD ["postgres", "-c", "config_file=/etc/postgresql/postgresql.conf"]
