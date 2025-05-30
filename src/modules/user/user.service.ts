/* eslint-disable prettier/prettier */
import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { User } from './user.entity';
import { createUserDto } from './dto/create-user.dto';

@Injectable()
export class UsersService {
  constructor(
    @InjectRepository(User)
    private usersRepo: Repository<User>,
  ) {}

  async getUser(username: string): Promise<User | null> {
    return this.usersRepo.findOne({
      where: { username },
      relations: ['tasks'],
    });
  }

  async createUser(body: createUserDto): Promise<User> {
    const user = this.usersRepo.create(body);
    return this.usersRepo.save(user);
  }

  async updateUser(body: {
    username: string;
    email: string;
    password: string;
  }): Promise<User | null> {
    const user = await this.usersRepo.findOne({
      where: { username: body.username },
    });
    if (!user) {
      throw new Error('User not found');
    }
    Object.assign(user, body);
    return this.usersRepo.save(user);
  }

  async deleteUser(username: string): Promise<void> {
    await this.usersRepo.delete({ username });
  }
}