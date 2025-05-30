/* eslint-disable prettier/prettier */
import { Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { Task } from './task.entity';
import { User } from '../user/user.entity';

@Injectable()
export class TaskService {
  constructor(
    @InjectRepository(Task)
    private taskRepo: Repository<Task>,
  ) {}

  //Create task
  async createTask(data: Partial<Task>, user: User) {
    const task = this.taskRepo.create({ ...data, user });
    return await this.taskRepo.save(task);
  }

  //  Get a single task by ID
  async getTask(id: number) {
    const task = await this.taskRepo.findOne({
      where: { id },
      relations: ['user'],
    });
    if (!task) throw new NotFoundException(`Task with ID ${id} not found`);
    return task;
  }

  // Get all tasks (optional: filter by user)
  async getAllTasks() {
    return this.taskRepo.find({ relations: ['user'] });
  }

  // Update task
  async updateTask(id: number, data: Partial<Task>) {
    const result = await this.taskRepo.update(id, data);
    if (result.affected === 0)
      throw new NotFoundException(`Task ${id} not found`);
    return this.getTask(id);
  }

  //
  async deleteTask(id: number) {
    const result = await this.taskRepo.delete(id);
    if (result.affected === 0)
      throw new NotFoundException(`Task ${id} not found`);
    return { message: `Task ${id} deleted successfully` };
  }
}